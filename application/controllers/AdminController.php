<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \LeanCloud\User;

class AdminController extends BaseController {
	function __construct() {
		parent::__construct();
		if (User::getCurrentUser() == null) {
			redirect('../manager/login');
		}
	}
}
