<?php
require_once('BaseController.php');

class Login extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$message = urldecode($_GET['message']);
		require_once('views/login.php');
	}

	public function submit() {
		$username = $_POST['username'];
		$pin      = $_POST['pin'];


		require_once('models/user.php');
		$userModel = new UserModel();
		$userData = $userModel->authenticate($username, $pin);
		
		if ($userData[0]) {
			$_SESSION['logged_in'] = 1;
			$_SESSION['username'] = $userData[0]['username'];
			if ($userModel->isAdministrator($userData[0]['username'])) {
				$_SESSION['administrator'] = 1;
				header('Location: ' . SITE_ROOT . 'admin');
			}
			else {
				header('Location: ' . SITE_ROOT . 'search');
			}
		}
		else {
			$message = "The credentials provided were incorrect";
			header('Location: ' . SITE_ROOT . 'login?message=' . urlencode($message));
		}
	}

	public function logout() {
		session_destroy();
		header('Location: ' . SITE_ROOT . 'login');
	}
}
