<?php
require_once('BaseController.php');

class Search extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		require_once('views/search.php');
	}
}