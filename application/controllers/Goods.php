<?php

use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;

class Goods extends BaseController {
	
	public function add() {
		$data['title'] = '添加商品';
		// $this->load->view('goods_add', $data);
		$this->layout->view('goods/add', $data);
	}
	
	public function save() {
		// 获取参数
		$avatar = $this->input->post('avatar');
		$title = $this->input->post('title');
		$this->load->library('upload');
		// 图片上传
		$file = File::createWithLocalFile($_FILES['avatarFile']['tmp_name'], $_FILES['avatarFile']['type']);
		// 保存图片
		$file->save();
		// save to leanCloud
		$object = new Object("Goods");
		$object->set("title", $title);
		$object->set("avatar", $avatar);
		$object->set("avatarFile", $file);
		try {
			$object->save();
			echo "发布成功";
		} catch (Exception $ex) {
			echo "操作失败";
			var_dump($ex);
		}
	}

	// 商品列表-element
	// public function index() {
		// $data['title'] = '商品列表';
		// $data['js'] = 'goods/index';
		// $this->layout->view('goods/index', $data);
	// }

	// 商品列表-adminlte
	public function index() {
		// 获取get参数
		$pageIndex = $this->input->get('per_page');
		// 分页查询数据
		$query = new Query("Goods");
		$query->_include("category");
		$query->ascend("updatedAt");
		$query->limit($this->config->item('per_page'));
		$query->skip($this->config->item('per_page') * ($pageIndex - 1));
		$result = $query->find();
		// 分页控件
		// url路径前缀
		$config['base_url'] = base_url(uri_string());
		// 总条数
		$config['total_rows'] = (new Query("Goods"))->count();
		// 初始化
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		// 渲染
		$data['result'] = $result;
		$data['title'] = '商品列表';
		$this->layout->view('goods/index', $data);
	}
}
