<?php
require_once('BaseController.php');

class Cart extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// get data from cart model
		require_once('models/cart.php');

		if (isset($_SESSION['username'])){
			$model = new CartModel();
			$data = $model->getCartItems($_SESSION['username']);
		} else {
			$error = "Please log in to view your cart!";
		}

		// load the view
		require_once('views/cart.php');
	}

	public function add($isbn) {
		require_once('models/cart.php');

		if (isset($_SESSION['username'])) {
			$cart = new CartModel();
			$cart->addBook($isbn);
		} else {
			$error = "Please log in to add items to your cart!";
		}

		//load the view
		$this->index();
	}

	public function checkout() {
		require_once('views/checkout.php');
	}
}