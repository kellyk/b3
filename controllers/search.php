<?php
require_once('BaseController.php');

class Search extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		require_once('views/search.php');
	}

	public function results($query) {
		// get data from search model
		require_once('models/search.php');
		$model = new SearchModel();

		$searchFor = $_POST['searchFor'];
		$searchIn = $_POST['searchIn'];
		$category = $_POST['category'];

		$data = $model->getData($searchFor, $searchIn, $category);

		// load the view
		require_once('views/search_results.php');
	}

	public function reviews() {
		require_once('views/reviews.php');
	}
}