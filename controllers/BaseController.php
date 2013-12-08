<?php
class BaseController {
	public function __construct() {
		include('settings.php');
		$this->connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);
		if (!$this->connection) {
			die ("Cold not connect to the database: <br />" . mysqli_connect_error());
		}
	}

	public function missing_controller() {
		require_once('views/404.php');
	}
}
?>
