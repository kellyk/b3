<?php
require_once('BaseController.php');

class Login extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		require_once('views/login.php');
	}

	public function submit() {

	}
}