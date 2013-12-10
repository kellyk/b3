<?php
require_once('BaseModel.php');

class UserModel extends BaseModel {

	public function __construct() {
		parent::__construct();

		$this->user_def = array(
			"username"   => "STRING",
			"PIN"        => "DECIMAL",
			"first_name" => "STRING",
			"last_name"  => "STRING",
			"city"       => "STRING",
			"address"    => "STRING",
			"zip"        => "DECIMAL",
			"state"      => "STRING",
			"cctype"     => "STRING",
			"ccnumber"   => "DECIMAL"
		);
		
		$this->user_id = "username";
	}

	public function getUser($username) {
		$sql = "SELECT *
	    		FROM user
	    		WHERE user.username = '{$username}';";
		
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

	public function getAdministrator($username) {
		return $this->performQuery(
			"SELECT *
			FROM user natural join administrator
			WHERE user.username = '$username';"
		);
			
	}

	public function update($username, $col, $val) {
		parent::update($username, $col, $val, "user");
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

	public function updateCreditCard($type, $number) {
		$sql = "UPDATE user
				SET ccnumber = '{$number}',
					cctype = '{$type}'
				WHERE username = '{$_SESSION['username']}';";
		echo $sql;
		$result= $this->performWrite($sql);
		return $result;
	}
}
