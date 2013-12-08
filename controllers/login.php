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

	 	$stmt = $this->connection->prepare(
			"SELECT username FROM user WHERE username = ? AND PIN = ?"
		);
		$stmt->bind_param('sd', $username, $pin);
		$stmt->execute();
		$stmt->bind_result($username_found);

		if ($stmt->fetch()) {
			$_SESSION['logged_in'] = 1;
			$_SESSION['username'] = $username_found;
			header('Location: ' . SITE_ROOT . 'search');
		}
		else {
			$message = "The credentials provided were incorrect";
			header('Location: ' . SITE_ROOT . 'login?message=' . urlencode($message));
		}
	}
}
