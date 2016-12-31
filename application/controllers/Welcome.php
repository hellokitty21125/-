<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__ . '/../../vendor/autoload.php';
// require_once __DIR__ . '/../../vendor/leancloud/leancloud-sdk/src/autoload.php';

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function lean() {
		LeanCloud\Client::initialize("FwXizf8zlFEMKtCoxwe5q3Ef-gzGzoHsz", "NwsIpoDzCVedWjnKwv7qy8Dd", "qFIU9RmLWMIkTw1SQXRTdOUO");
		var_dump( LeanCloud\Client::get("/date") ); // 获取服务器时间
		
	}
}
