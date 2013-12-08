<?php
require_once('BaseModel.php');

class UserModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getUser($username) {
		$sql = "SELECT *
	    		FROM user
	    		WHERE user.username = $username;";
		

		$data = $this->performQuery($sql);
		return $data;
	}

	public function authenticate($username, $pin) {
		$sql = "SELECT *
			FROM user
			WHERE user.username = '$username'
			AND user.PIN = $pin;";

		$data = $this->performQuery($sql);
		return $data;
	}
}
