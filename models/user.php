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

	public function isAdministrator($username) {
		$sql = "SELECT *
			FROM administrator
			WHERE administrator.username = '$username';";

		$data = $this->performQuery($sql);
		if ($data[0]) {
			return true;
		}
		return false;
	}

	public function createUser($data) {
		$sql = "INSERT INTO user
				VALUES (
					'{$_POST['username']}',
				     {$_POST['pin']},
					'{$_POST['firstname']}',
					'{$_POST['lastname']}',
					'{$_POST['city']}',
					'{$_POST['street']}',
					'{$_POST['zip']}',
					'{$_POST['state']}',
					'{$_POST['card_type']}',
					{$_POST['card_number']}
				)
			;";

		$result = $this->performWrite($sql);

		return $result;
	}

	public function checkDuplicateUsername($name) {
		$sql = "SELECT *
				FROM user
				WHERE username = '{$name}'
			;";

		$result = $this->performQuery($sql);
		
		return (sizeof($result) <= 0);
	}
}
