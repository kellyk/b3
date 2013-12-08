<?php
class BaseModel {
	public function __construct() {
		include('includes/settings.php');
	}

	public function connect() {
		$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if ($db->connect_errno) {
		    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		}
		
		return $db;
	}

	public function performQuery($sql) {
		$db = $this->connect();
		$data = array();
		$result = $db->query($sql);

		if (!$result) {
		    die('There was an error running the query [' . $db->error . ']' . ' (Query: ' . $sql . ')');
		} 

		while($row = $result->fetch_assoc()){
		  	array_push($data, $row);
		}

		return $data;
	}
}