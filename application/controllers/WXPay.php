<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../third_party/wxpay/WxPay.Api.php';

class WXPay extends BaseController {
	function index() {
// 		初始化值对象
		$input = new WxPayUnifiedOrder();
// 		文档提及的参数规范：商家名称-销售商品类目
		$input->SetBody("灵动商城-手机");
// 		订单号应该是由小程序端传给服务端的，在用户下单时即生成，demo中取值是一个生成的时间戳
		$input->SetOut_trade_no('1231231231');
// 		费用应该是由小程序端传给服务端的，在用户下单时告知服务端应付金额，demo中取值是1，即1分钱
		$input->SetTotal_fee("10");
		$input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
		$input->SetTrade_type("JSAPI");
// 		由小程序端传给服务端
		$input->SetOpenid($this->input->post('openId'));
// 		向微信统一下单，并返回order，它是一个array数组
		$order = WxPayApi::unifiedOrder($input);
// 		json化返回给小程序端
		header("Content-Type: application/json");
                echo $this->getJsApiParameters($order);
	}
        
        public function getJsApiParameters($UnifiedOrderResult)
	{
		if(!array_key_exists("appid", $UnifiedOrderResult)
		|| !array_key_exists("prepay_id", $UnifiedOrderResult)
		|| $UnifiedOrderResult['prepay_id'] == "")
		{
			throw new WxPayException("参数错误");
		}
		$jsapi = new WxPayJsApiPay();
		$jsapi->SetAppid($UnifiedOrderResult["appid"]);
		$timeStamp = time();
		$jsapi->SetTimeStamp("$timeStamp");
		$jsapi->SetNonceStr(WxPayApi::getNonceStr());
		$jsapi->SetPackage("prepay_id=" . $UnifiedOrderResult['prepay_id']);
		$jsapi->SetSignType("MD5");
		$jsapi->SetPaySign($jsapi->MakeSign());
		$parameters = json_encode($jsapi->GetValues());
		return $parameters;
	}
}