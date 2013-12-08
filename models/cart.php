<?php
require_once('BaseModel.php');

class CartModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getData() {
		$sql = $this->getCartItems();
		$data = $this->performQuery($sql);

		return $data;
	}

	private function getCartItems() {
		$username = "Jonny97"; //this should actually be accessing the session variable

		return "SELECT *
	    		FROM cart_item, book, author, wrote
	    		WHERE cart_item.isbn = book.isbn 
	    		AND wrote.isbn = book.isbn 
	    		AND wrote.author_id = author.id
	    		AND cart_item.username = '$username'
	    		GROUP by book.isbn;";
	}
}