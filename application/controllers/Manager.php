<?php

use LeanCloud\User;

class Manager extends BaseController {
	// 管理员登录
	public function login() {
		// 首先判断是否已经登录
		if (User::getCurrentUser() == null) {
			$this->load->view('login');
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
		var_dump($this->input->post());
		var_dump($username);
		var_dump($password);
		// User::logIn("Tom", "cat!@#123");
		User::logIn($username, $password);
		if (User::getCurrentUser() != null) {
			// 登录成功跳转
			redirect('../dashboard/index');
		} else {
			echo '用户名或密码错误';
		}
	}

	// 修改密码
	public function profile() {
		$this->layout->view('manager/profile');
	}
}
?>