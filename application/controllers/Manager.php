<?php

use LeanCloud\User;

class Manager extends BaseController {
	function __construct() {
		parent::__construct();
		$this->load->model('Manager_model', 'manager_model');
	}
	// 管理员登录
	public function login() {
		// 首先判断是否已经登录
		if (User::getCurrentUser() == null) {
			$this->load->view('manager/login');
		} else {
			redirect('../dashboard/index');
		}
	}

	// 管理员退出
	public function logout() {
		User::logout();
		redirect('../manager/login');
	}

	// 管理员验证
	public function verify() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($this->manager_model->verify($username, $password)) {
			// 登录成功跳转
			// redirect('../dashboard/index');
			$this->echo_json('登录成功');
		} else {
			// 给出弹窗提示
			$this->echo_json('用户名或密码错误', false);
		}
	}

	// 修改密码
	public function profile() {
		$this->layout->view('manager/profile');
	}

	// 保存资料
	public function save() {
		$data['msg'] = '操作成功';
		$data['level'] = 'info';
		$data['redirect'] = 'profile';
		$this->layout->view('manager/msg', $data);
	}
}
?>