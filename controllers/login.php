<?php
require_once('BaseController.php');

class Login extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		require_once('views/login.php');
	}

	public function error($message) {
		$message = urldecode($message);
		require_once('views/login.php');
	}

	public function submit() {
		$username = $_POST['username'];
		$pin      = $_POST['pin'];

		// Insure the pin matches an integer.
		if (preg_match("/^\d+$/", $pin)) {
			require_once('models/user.php');
			$userModel = new UserModel();
			try {
				$userData = $userModel->authenticate($username, $pin);
			}
			catch(Exception $e) {
				$message = urlencode("Query execution failed: " . $e->getMessage() . ".");
				if ($_POST['insure_admin']) {
					header('Location: ' . SITE_ROOT . "admin/login/$message");
				}
				else {
					header('Location: ' . SITE_ROOT . "login/error/$message");
				}
				exit();
			}
		}
		
		if ($userData[0]) {
			$_SESSION['logged_in'] = 1;
			$_SESSION['username'] = $userData[0]['username'];
			if ($userModel->isAdministrator($userData[0]['username'])) {
				$_SESSION['administrator'] = 1;
				header('Location: ' . SITE_ROOT . 'admin');
			}
			else {
				if ($_POST['insure_admin']) {
					session_destroy();
					$message = urlencode("The login credentials provided were invalid.");
					header('Location: ' . SITE_ROOT . 'admin/login/$message');
				}
				else {
					header('Location: ' . SITE_ROOT . 'search');
				}
			}
		}
		else {
			$message = urlencode("The credentials provided were invalid.");
			if ($_POST['insure_admin']) {
				header('Location: ' . SITE_ROOT . "admin/login/$message");
			}
			else {
				header('Location: ' . SITE_ROOT . "login/error/$message");
			}
		}
	}

	public function logout() {
		session_destroy();
		header('Location: ' . SITE_ROOT . 'login');
	}
}
