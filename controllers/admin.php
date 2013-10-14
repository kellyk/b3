<?php
require_once('BaseController.php');

class Admin extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// load the view
		$this->_admin_skin('views/admin/blank.php');
	}

	public function login() {
		require_once('views/admin/login.php');
	}

	public function catalog() {
		$this->_admin_skin('views/admin/catalog.php');
	}

	public function add_edit() {
		$this->_admin_skin('views/admin/add_edit.php');
	}

	public function search() {
		$this->_admin_skin('views/search.php');
	}

	public function search_results() {
		$this->_admin_skin('views/admin/search_results.php');
	}

	public function orders() {
		$this->_admin_skin('views/admin/orders.php');
	}

	public function reports() {
		$this->_admin_skin('views/admin/reports.php');
	}

	public function profile() {
		$this->_admin_skin('views/admin/profile.php');
	}

	public function logout() {
		// log user out and redirect to homepage
		header( 'Location: ' . SITE_ROOT );
	}

	public function _admin_skin($view) {
		require_once('views/admin/dashboard.php');
		require_once($view);
		require_once('views/global/footer.php');
	}
}
