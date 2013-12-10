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

		$data['books'] = $this->performQuery($sql);

	    // compute the total price for each book, depending on the number of copies
		foreach ($data['books'] as &$book) {
			$data['num_books'] += $book['quantity'];
			$book['total'] = $book['price'] * $book['quantity'];
			$data['total'] += $book['total'];
		}

		return $data;
	}

	private function emptyCart() {
		// remove individual books from cart_items
		$data = $this->getCartItems($_SESSION['username']);
		foreach($data['books'] as $book) {
			$this->removeBook($book['isbn']);
		}
	}

	public function addBook($isbn) {
		// need to check if this user already has a copy of this book in their cart
		$result = $this->checkForDuplicate($isbn);

		if ($result) { // If so, the returned value is the quantity. Increment and update
			$result++;
			$this->updateBookQuantity($isbn, $result);
		} else { // If not, add to cart
			$this->addNewBook($isbn);
		}

		return;
	}

	public function removeBook($isbn) {
		$sql = "DELETE FROM cart_item 
				WHERE username = '{$_SESSION['username']}'
				AND isbn = '{$isbn}'
				;";

		$result = $this->performWrite($sql);
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

	public function updateBookQuantity($isbn, $quantity) {
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

	public function placeOrder($user) {
		$user = $user[0];
		$sql = "INSERT INTO orders
				(username, address_line, address_city, address_state, address_zip, ccnumber, cctype)
		   VALUES('{$user['username']}', '{$user['address']}', '{$user['city']}', '{$user['state']}',
		   		  '{$user['zip']}', {$user['ccnumber']}, '{$user['cctype']}'
		);";
		$result = $this->performWrite($sql);
		return $result;
	}

	public function addLineItems($id) {
		$data = $this->getCartItems($_SESSION['username']);
		foreach($data['books'] as $book) {
			$this->addLine($book, $id);
			$this->reduceInventory($book);
		}

		$this->emptyCart();
	}

	protected function addLine($book, $order_id) {
		$sql = "INSERT INTO line_item
				values({$order_id}, '{$book['isbn']}', {$book['quantity']}, {$book['price']})
			;";

		$result = $this->performWrite($sql);
		return $result;
	}

	protected function reduceInventory($book) {
		// get number of this book available and reduce by 1
		$countSQL = "SELECT inventory_quantity
			FROM book 
			WHERE isbn = '{$book['isbn']}';";

		$count = $this->performQuery($countSQL);
		$count = $count[0]['inventory_quantity'] ? $count[0]['inventory_quantity'] : 0;
		$count--;

		// set the new quantity
		$sql = "UPDATE book 
				SET inventory_quantity = $count
				WHERE isbn = '{$book['isbn']}'
				;";

		$result = $this->performWrite($sql);

		return;
	}
}
