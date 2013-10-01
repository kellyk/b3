<?php
require_once('BaseController.php');

class Profile extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		require_once('views/profile.php');
	}

	public function register() {
		require_once('views/register.php');
	}
}