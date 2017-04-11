<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends BaseController {
	function __construct() {
		parent::__construct();
		parent::checkLogin();
	}
}
