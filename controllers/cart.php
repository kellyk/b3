<?php
require_once('BaseController.php');

class Cart extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// get data from cart model
		require_once('models/cart.php');
		$model = new CartModel();
		$data = $model->getData();

		// load the view
		require_once('views/cart.php');
	}

	public function checkout() {
		require_once('views/checkout.php');
	}
}