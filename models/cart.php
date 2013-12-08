<?php
require_once('BaseModel.php');

class CartModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getCartItems($username) {
		$sql = "SELECT *
	    		FROM cart_item, book, author, wrote
	    		WHERE cart_item.isbn = book.isbn 
	    		AND wrote.isbn = book.isbn 
	    		AND wrote.author_id = author.id
	    		AND cart_item.username = '$username'
	    		GROUP by book.isbn;";

		$data = $this->performQuery($sql);

		return $data;
	}

	public function addBook($isbn) {
		// need to check and see if this user already has this book in their cart
		$result = $this->checkForDuplicate($isbn);

		if ($result) { // If so, the returned value is the quantity. Increment and update
			$result++;
			$this->updateBookQuantity($isbn, $result);
		} else { // If not, add to cart
			$this->addNewBook($isbn);
		}

		return;
	}

	private function checkForDuplicate($isbn) {
		$sql = "SELECT * 
				FROM cart_item
				WHERE username = '{$_SESSION['username']}'
				AND isbn = $isbn;";
		$result = $this->performQuery($sql);

		if (sizeof($result[0]) < 1)
			return false;
		else {
			return $result[0]['quantity'];
		}
	}

	private function updateBookQuantity($isbn, $quantity) {
		$sql = "UPDATE cart_item 
				SET quantity = $quantity
				WHERE isbn = $isbn
				;";

		$result = $this->performWrite($sql);
		return;
	}

	private function addNewBook($isbn) {
		$sql = "INSERT INTO cart_item 
				VALUES (
					'{$_SESSION['username']}',
					'{$isbn}', 
					1 
				);";

		$result = $this->performWrite($sql);
		return;
	}
}