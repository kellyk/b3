<?php
require_once('BaseController.php');

class Admin extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// load the view
		require_once('views/admin/dashboard.php');
		require_once('views/admin/blank.php');
	}

	public function login() {
		require_once('views/admin/login.php');
	}

	public function catalog() {
		require_once('views/admin/dashboard.php');
		require_once('views/admin/catalog.php');
	}

	public function add_edit() {
		require_once('views/admin/dashboard.php');
		require_once('views/admin/add_edit.php');
	}
	
	public function search() {
		require_once('views/admin/dashboard.php');
		require_once('views/search.php');
	}
}
