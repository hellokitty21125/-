<?php
use \LeanCloud\Query;

class Category_model extends CI_Model {
	public function find($parent = null) {
		$query = new Query("Category");
		$query->equalTo('parent', $parent);
		$categoris = $query->find();
		return $categoris;
	}

	public function findAll() {
		// 1. 查询所有顶级分类
		$query = new Query("Category");
		$query->equalTo('parent', null);
		$categoris = $query->find();
		// 2. sub
		$result = array();
		foreach ($categoris as $parent) {
			$query->equalTo('parent', $parent);
			$children = $query->find();
			$result[$parent->get('title')] = $children;
		}
		return $result;
	}
}
?>