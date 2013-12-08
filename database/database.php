<?php

function connect() {
	$db = new mysqli("localhost", "root", "root", "b3");

	if ($db->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}
	return $db;
}

function performQuery($sql) {
	$db = connect();
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