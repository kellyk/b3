<?php
require_once('BaseModel.php');

class BookModel extends BaseModel {

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

		$this->book_id = 'isbn';
	}

	// return all books in database
	function getBooks() {
		$sql = "SELECT *
	    		FROM book, author, wrote
	    		WHERE wrote.isbn = book.isbn 
	    		AND wrote.author_id = author.id
	    		GROUP by book.isbn;";

	    $data = $this->performQuery($sql);
		return $data;
	}

	// search for books by ISBN -- since this is primary key, should return one result
	function getBookByISBN($isbn) {
		$sql = "SELECT *
	    		FROM book, author, wrote
	    		WHERE wrote.isbn = book.isbn 
	    		AND wrote.author_id = author.id
	    		AND book.isbn = '$isbn'
	    		GROUP by book.isbn;";

	    $data = $this->performQuery($sql);
		return $data;
	}

	// search for books by title
	function getBooksByTitle($title) {
		$term = '"%' . $title . '%"';
		$sql = "SELECT *
	    		FROM book, author, wrote
	    		WHERE wrote.isbn = book.isbn 
	    		AND wrote.author_id = author.id
	    		AND title like $term
	    		GROUP by book.isbn;";

	    $data = $this->performQuery($sql);
		return $data;
	}

	// search for books by title
	function getBooksByAuthor($author) {
		$term = '"%' . $author . '%"';
		$sql = "SELECT *
	    		FROM book, author, wrote
	    		WHERE wrote.isbn = book.isbn 
	    		AND wrote.author_id = author.id
	    		AND (author.last_name like $term
	    		OR author.first_name like $term)
	    		GROUP by book.isbn";

	    $data = $this->performQuery($sql);
		return $data;
	}

	// search for books by title
	function getBooksByPublisher($publisher) {
		$term = '"%' . $publisher . '%"';
		$sql = "SELECT *
	    		FROM book
	    		WHERE title like $term;";

	    $data = $this->performQuery($sql);
		return $data;
	}

	//Create book. Parameter is an associative array.
	function createBook($details) {
		return $this->insert($details, "book");
	}

	//Update a column
	function update($isbn, $col, $val) {
		parent::update($isbn, $col, $val, "book");
	}
}
