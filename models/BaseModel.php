<?php
class BaseModel {
	public function __construct() {
		include('includes/settings.php');
	}

	public function connect() {

		if (!$this->db) {
			$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if ($db->connect_errno) {
				echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
				return $db;
			}
			$this->db = $db;
		}
		
		
		return $this->db;
	}

	public function performQuery($sql) {
		$db = $this->connect();
		$data = array();
		$result = $db->query($sql);

		if (!$result) {
			throw new Exception('There was an error running the query [' . $db->error . ']' . ' (Query: ' . $sql . ')');
		} 

		while($row = $result->fetch_assoc()){
		  	array_push($data, $row);
		}

		return $data;
	}

	public function performWrite($sql) {
		$db = $this->connect();
		$result = $db->query($sql);

		if (!$result) {
		    throw new Exception('There was an error running the query [' . $db->error . ']' . ' (Query: ' . $sql . ')');
		}

		return $result;
	}

	public function insert($data, $table) {
		$def = $table . "_def";
		$keys = array_keys($data);
		$sql = "INSERT INTO $table (";
		foreach ($keys as $key) {
			$sql = $sql . "$key, ";
		}

		// replace trialing comma with parenth.
		preg_replace('/\, $/', ") VALUES(", $sql);
		foreach ($keys as $key) {
			if ($this->$def[$key] == 'INTEGER' || $this->$def[$key] == 'DECIMAL') {
				$sql = $sql . $data[$key] . ", ";
			}
			else {
				$sql = $sql . "'" . $data[$key] . "', ";
			}
		}

		preg_replace('/\, $/', ");", $sql);
		die($sql);
	}
}
