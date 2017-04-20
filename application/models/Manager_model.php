<?php

use \LeanCloud\User;


class Manager_model extends CI_Model {
	public function verify($username, $password) {
		try {
			User::logIn($username, $password);
			if (User::getCurrentUser() != null) {
				return true;
			} 
		} catch (Exception $ex) {
			return false;
		}
		return false;
	}
}