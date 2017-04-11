<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__ . '/../../vendor/autoload.php';

use \LeanCloud\Client;

class BaseController extends CI_Controller {
	function __construct() {
		parent::__construct();
		// 参数依次为 AppId, AppKey, MasterKey
		Client::initialize("SgHcsYqoLaFTG0XDMD3Gtm0I-gzGzoHsz", "xdv2nwjUK5waNglFoFXkQcxP", "v3P5xzDa0b5CStO0xX0biHpT");
	}
}
