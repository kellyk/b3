<?php
require_once('BaseModel.php');
require_once('database/database.php');
require_once('database/search.php');

class SearchModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getData($term, $fields, $category) {
		$sql = getSearchResults($term, $fields, $category);
		$data = performQuery($sql);

		return $data;
	}
}