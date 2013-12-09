<?php
require_once('BaseModel.php');

class AuthorModel extends BaseModel {

	public function __construct() {
		parent::__construct();
		
		$this->author_def = array(
			"id"         => "INTEGER",
			"first_name" => "STRING",
			"last_name"  => "STRING",
		);

		$this->wrote_def = array(
			"author_id" => "INTEGER",
			"isbn"      => "STRING",
		);
	}

	public function getByID($id) {
		return $this->performQuery(
			"SELECT *
			FROM Author
			WHERE id = $id;"
		);
	}	

	public function getByISBN($isbn) {
		return $this->performQuery(
			"SELECT *
			FROM author, wrote
			WHERE author.id = wrote.author_id
			AND wrote.isbn = '$isbn';"
		);
	}

	public function getByName($first, $last) {
		return $this->performQuery(
			"SELECT *
			FROM author
			WHERE first_name = '$first'
			AND last_name = '$last';"
		);
	}

	public function create($data) {
		return $this->insert($data, "author");
	}

	public function addWrote($data) {
		return $this->insert($data, "wrote");
	}

	public function removeWrote($id, $isbn) {
		$sql = "DELETE FROM wrote WHERE author_id = $id AND isbn = $isbn;";
		return $this->performWrite($sql);
	}
};

