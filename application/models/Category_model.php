<?php
use \LeanCloud\Query;

class Category_model extends CI_Model {
	public function find($parent = null) {
		$query = new Query("Category");
		$query->equalTo('parent', $parent);
		$categoris = $query->find();
		return $categoris;
	}
}
?>