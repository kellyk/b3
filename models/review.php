<?php
require_once('BaseModel.php');

class ReviewModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getReviews($isbn) {
		$sql = "SELECT *
	    		FROM review, book
	    		WHERE review.isbn = book.isbn
	    		AND review.isbn = $isbn;";
		

		$data = $this->performQuery($sql);
		return $data;
	}
}