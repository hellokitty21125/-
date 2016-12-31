<?php
require_once __DIR__ . '/BaseController.php';

use \LeanCloud\Object;
use \LeanCloud\Query;
use \LeanCloud\File;

class Goods extends BaseController {
	
	public function add() {
		$this->load->view('goods_add');
	}
	
	public function save() {
		// get param
		
		$avatar = $this->input->post('avatar');
		$file = File::createWithUrl("avatar.jpg", $avatar);
		
		$title = $this->input->post('title');
		
		// save to leanCloud
		
		$testObject = new Object("Goods");
		
		$testObject->set("title", $title);
		$testObject->set("avatarFile", $file);
		
		try {
			$testObject->save();
			echo "Save object success!";
		} catch (Exception $ex) {
			echo "Save object fail!";
			var_dump($ex);
		}
	}
}
