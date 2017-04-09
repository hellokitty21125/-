<?php
require_once __DIR__ . '/BaseController.php';
class User extends BaseController {
	public function login() {
		$this->load->view('login');
	}
}
?>