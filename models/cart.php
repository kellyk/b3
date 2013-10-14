<?php
require_once('BaseModel.php');
class CartModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getData() {
		// some dummy data
		$item1 = array(
			'isbn' => 123456789,
			'bookTitle'    => 'Intro to Databases',
			'author' => 'Jon Stewart',
			'publishDate'     => '03-MAR-2001',
			'price'     => 119.99
		);

		$item2 = array(
			'isbn' => 999999999,
			'bookTitle'    => 'Dos Mundos',
			'author' => 'Shawn Spencer',
			'publishDate'     => '12-JAN-2009',
			'price'     => 47.99
		);

		$array = array($item1, $item2);

		return $array;
	}
}