<?php
require_once __DIR__ . '/AdminController.php';

use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;

class Category extends AdminController {
	function __construct() {
		parent::__construct();
		$this->load->model('Category_model', 'category_model');
	}

	// 分类列表
	public function index() {
		$categories = $this->category_model->findAll();
		$data['categories'] = $categories;
		$this->layout->view('category/index', $data);
	}

	// 添加分类
	public function add() {
		// 页面传递进一个父类id，那么需要将下拉选择器的选中当前，如果编辑时那样
		$objectId = $this->input->get('objectId');
		$data['objectId'] = $objectId;
		// 全部分类
		$data['categories'] = $this->category_model->findAll();
		$this->layout->view('category/add', $data);
	}

	// 编辑分类
	public function edit() {

	}
	
	// 保存分类
	public function save() {
		// 父类id
		$objectId = $this->input->post('category');
		$category = null;
		if ($objectId != "") {
			// 创建的非顶级分类
			$category = Object::create('Category', $objectId);
		}
		// 序号
		$index = $this->input->post('index');
		// 分类图片上传
		$avatar = File::createWithLocalFile($_FILES['avatar']['tmp_name'], $_FILES['avatar']['type']);
		// 保存图片
		$avatar->save();
		// banner图片上传
		$banner = File::createWithLocalFile($_FILES['banner']['tmp_name'], $_FILES['banner']['type']);
		// 保存图片
		$banner->save();
		// 获取参数
		$title = $this->input->post('title');
		// save to leanCloud
		$object = new Object("Category");
		// 标题
		$object->set("title", $title);
		// 将category转为LeanCloud对象
		$object->set("category", $category);
		// 序号
		// $object->set("index", $index);
		// 分类图
		$object->set("avatar", $avatar);
		// banner图
		$object->set("banner", $banner);
		// 提示信息 
		$data['redirect'] = 'index';
		try {
			$object->save();
			$data['msg'] = '创建成功';
			$data['level'] = 'info';
			$this->layout->view('category/msg', $data);
		} catch (Exception $ex) {
			$data['msg'] = '操作失败';
			$data['level'] = 'warning';
			// var_dump($ex);
		} finally {
			$this->layout->view('category/msg', $data);
		}
	}

	// 删除分类
	public function delete() {
		$objectId = $this->input->get('objectId');
		$this->category_model->delete($objectId);
		$data['msg'] = '删除成功';
		$data['level'] = 'info';
		$data['redirect'] = 'index';
		$this->layout->view('category/msg', $data);
	}
}
