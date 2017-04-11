<?php

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

	// 商品列表-element
	// public function index() {
		// $data['title'] = '商品列表';
		// $data['js'] = 'goods/index';
		// $this->layout->view('goods/index', $data);
	// }

	// 商品列表-adminlte
	public function index() {
		// 获取get参数
		$pageIndex = $this->input->get('per_page', 1);
		// 分页查询数据
		$query = new Query("Goods");
		$query->_include("category");
		$query->ascend("updatedAt");
		$query->limit($this->pageSize);
		$query->skip($this->pageSize * ($pageIndex - 1));
		$result = $query->find();
		// 分页控件
		$this->load->library('pagination');
		// 路径前缀
		$config['base_url'] = base_url('index.php/goods/index');
		// 总条数
		$config['total_rows'] = (new Query("Goods"))->count();
		// 左右侧显示页数
		$config['num_links'] = 5;
		// 每页条数
		$config['per_page'] = $this->pageSize; 
		// 页码模式
		$config['use_page_numbers'] = true; 
		// enable_query_strings风格
		$config['page_query_string'] = true;
		// 整个分页控件
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		// 第一页
		$config['first_link'] = '&lt;&lt;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		// 最后一页
		$config['last_link'] = '&gt;&gt;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		// 上一页
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// 下一页
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		// 页码
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		// 当前页
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
		$config['cur_tag_close'] = '</li></a>';
		// 初始化
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		// 渲染
		$data['result'] = $result;
		$data['title'] = '商品列表';
		$this->layout->layout = 'layout';
		$this->layout->view('goods/index', $data);
	}
}
