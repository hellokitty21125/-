<?php
class User extends BaseController {
	public function login() {
		$this->load->view('login');
	}
}
?>