<?php
require_once __DIR__ . '/BaseController.php';

use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;

class Goods extends BaseController {
	
	public function add() {
		$data['title'] = '添加商品';
		$this->load->view('goods_add', $data);
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

	// 商品列表
	public function index() {
		$this->load->view('goods/list');
	}
}
