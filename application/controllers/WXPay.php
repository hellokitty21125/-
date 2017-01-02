<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../third_party/wxpay/WxPay.Api.php';

class WXPay extends BaseController {
	function index() {
// 		初始化值对象
		$input = new WxPayUnifiedOrder();
// 		文档提及的参数规范：商家名称-销售商品类目
		$input->SetBody("灵动商城-手机");
		$input->SetAttach("test");
// 		订单号应该是由小程序端传给服务端的，在用户下单时即生成，demo中取值是一个生成的时间戳
		$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
// 		费用应该是由小程序端传给服务端的，在用户下单时告知服务端应付金额，demo中取值是1，即1分钱
		$input->SetTotal_fee("1");
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("test");
		$input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
		$input->SetTrade_type("JSAPI");
// 		由小程序端传给服务端
		$input->SetOpenid('ox-0I0VkzCYSFllCNgVWQ4PffMM0');
// 		向微信统一下单，并返回order，它是一个array数组
		$order = WxPayApi::unifiedOrder($input);
// 		json化返回给小程序端
		header("Content-Type: application/json");
		echo json_encode($order);
	}
}