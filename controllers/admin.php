<?php
require_once('BaseController.php');

class Admin extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// load the view
		require_once('views/admin/dashboard.php');
	}

	public function login() {
		require_once('views/admin/login.php');
	}
}