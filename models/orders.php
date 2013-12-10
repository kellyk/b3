<?php
require_once('BaseModel.php');

class OrderModel extends BaseModel {

	public function __construct() {
		parent::__construct();

		$this->orders_def = array(
			"order_number" => "INTEGER",
			"order_DATE"   => "STRING",
			"username"     => "STRING",
			"shipped_date" => "STRING",
			"address_line" => "STRING",
			"address_city" => "STRING",
			"address_state" => "STRING",
			"address_zip"  => "INTEGER",
			"cctype"       => "STRING",
			"ccnumber"     => "INTEGER",
		);

		$this->orders_id = "order_number";

		$this->line_item_def = array(
			"order_number" => "INTEGER",
			"isbn"         => "STRING",
			"quantity"     => "INTEGER",
			"unit_Price"   => "DECIMAL"
		);

		$this->line_item_id = "order_number";
	}

	public function getOrdersDetails() {
		require_once('models/user.php');
		$userModel = new UserModel();

		$sql = "SELECT *
			FROM orders
			WHERE shipped_date IS NULL;";
		
		$results = $this->performQuery($sql);
		
		foreach ($results as &$order) {
			$order['user'] = $userModel->getUser($order['username']);
			$order['user'] = $order['user'][0];
			$order['items'] = $this->getItems($order['order_number']);
			$order['shipping'] = 2 * count($order['items']);
			$order['total'] = $order['shipping'];
			foreach ($order['items'] as $item) {
				$order['total'] = $order['total'] + $item['quantity'] * $item['unit_price'];
			}
		}
		
		return $results;
	}

	public function getItems($order_number) {
		$sql = "SELECT *
			FROM line_item
			WHERE order_number = $order_number;";

		return $this->performQuery($sql);
	}

	public function ship($id) {
		return $this->update($id, "shipped_date", "NOW()");
	}

	public function cancel($id) {
		$this->performWrite("DELETE FROM line_item WHERE order_number = $id;");
		return $this->performWrite("DELETE FROM orders WHERE order_number = $id;");
	}

	public function update($id, $col, $value) {
		return parent::update($id, $col, $value, "orders");
	}


	public function getOrderedItems($username, $order_id) {
		$sql = "SELECT *
	    		FROM line_item
	    		INNER JOIN orders 
	    		ON orders.order_number = line_item.order_number
	    		INNER JOIN book 
	    		ON line_item.isbn = book.isbn
	    		WHERE orders.username = '{$username}'
	    		AND orders.order_number = {$order_id}
	    		AND orders.shipped_date IS NOT NULL";
	   			

	    $order = $this->performQuery($sql);

	    return $order;
	}

}
