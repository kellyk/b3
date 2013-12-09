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


	/* A function which simplifies inserts.
	Params: 
		$data - An associative array where the keys correspond to column names and values similarly.
		$table - the name of the table on which to insert.

	usage:
		This fuction assumes all data are strings unless there is a table definition
		in the model indicating which values are integers. Definitions must be stored
		in a model with the name $table_def . A definition might be declared in a 
		constructor like the following:

		public function __construct() {
			parent::__construct();
			
			$this->book_def = array(
				"isbn"               => "STRING",
				"title"              => "STRING",
				"category"           => "STRING",
				"publisher"          => "STRING",
				"deleted"            => "INTEGER",
				"inventory_quantity" => "INTEGER",
				"inventory_minimum"  => "INTEGER",
				"year_published"     => "INTEGER",
				"price"              => "DECIMAL",
			);
		}
	
		A call like below will produce an appropriate query and run it.

		//Create book. Parameter is an associative array.
		function createBook($detail) {
			return $this->insert(array(
				"isbn"               => '003241314',
				"title"              => "Fear and Loathing in Las Vegas",
				"price"              => 13.50,
				"inventory_quantity" => 10,
			), "book");
		}


		This will run the following query:
		
		INSERT INTO book (isbn, title, price, inventory_quantity) 
			VALUES('003241314', 'Fear and Loathing in Las Vegas', 13.5, 10);		
	*/
	
	public function insert($data, $table) {
		$def = $table . "_def";
		$def = $this->$def;
		$keys = array_keys($data);
		$sql = "INSERT INTO $table (";
		foreach ($keys as $key) {
			$sql = $sql . "$key, ";
		}

		// replace trialing comma with parenth.
		$sql = preg_replace('/\, $/', ") VALUES(", $sql);
		foreach ($keys as $key) {
			if ($def[$key] == 'INTEGER' || $def[$key] == 'DECIMAL') {
				$sql = $sql . $data[$key] . ", ";
			}
			else {
				$sql = $sql . "'" . $data[$key] . "', ";
			}
		}

		$sql = preg_replace('/\, $/', ");", $sql);
		
		return $this->performWrite($sql);
	}
}
