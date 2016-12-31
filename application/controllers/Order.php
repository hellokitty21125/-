<?php
require_once __DIR__ . '/BaseController.php';

use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;

class Order extends BaseController {
// 	获取订单
	public function all() {
		$query = new Query("Order");
		$query->_include('user');
		$query->descend("createdAt");
		$result = $query->find();
		$data['result'] = $result;
		$this->load->view('order_list', $data);
	}
}
