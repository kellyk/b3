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
		if (isset($_POST['username'])) {
			//all fields are required, so if the first one is populated, we can proceed

			// retrieve data from POST

			require_once('views/search.php');
		} else {
			require_once('views/register.php');
		}
	}
}