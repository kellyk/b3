<?php
require_once('BaseModel.php');
require_once('database/database.php');
require_once('database/cart.php');

class CartModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getData() {
		$sql = getCartItems();
		$data = performQuery($sql);

		return $data;
	}
}