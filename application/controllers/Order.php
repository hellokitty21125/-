<?php

use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;

class Order extends BaseController {
// 	获取订单
	public function index() {
		// 获取get参数
		$pageIndex = $this->input->get('per_page');
		// 分页查询数据
		$query = new Query("Order");
		$query->_include('user');
		$query->descend("createdAt");
		$query->limit($this->config->item('per_page'));
		$query->skip($this->config->item('per_page') * ($pageIndex - 1));
		$result = $query->find();
		$data['result'] = $result;
		$data['title'] = '订单列表';
		// 分页控件
		// url路径前缀
		$config['base_url'] = base_url(uri_string());
		// 总条数
		$config['total_rows'] = (new Query("Order"))->count();
		// 初始化
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		$this->layout->view('order/index', $data);
	}
}
