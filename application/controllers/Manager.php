<?php
use LeanCloud\User;
class Manager extends BaseController {
	public function login() {
		// 首先判断是否已经登录
		if (User::getCurrentUser() == null) {
			$this->load->view('login');
		} else {
			redirect('../dashboard/index');
		}
	}

	public function logout() {
		// User::logout();
		redirect('../manager/login');
	}
}
?>