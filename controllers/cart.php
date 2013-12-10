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
			$error_message = "Please log in to view your cart!";
		}

		// load the view
		require_once('views/cart.php');
	}

	public function add($isbn) {
		// processes data sent through URL structure as data param (cart/add/isbn)

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

	public function remove($isbn) {
		// processes data sent through URL structure as data param (cart/add/isbn)

		require_once('models/cart.php');
		$cart = new CartModel();
		$cart->removeBook($isbn);

		//load the view
		$this->index();
	}

	public function update() {
		// processes data sent via GET
		$isbn = $_POST['isbn'];
		$quantity = $_POST['quantity'];

		require_once('models/cart.php');
		$cart = new CartModel();
		$cart->updateBookQuantity($isbn, $quantity);

		//load the view
		$this->index();
	}

	public function checkout($error_message) {
		if (isset($_SESSION['username'])){

			// get the list of books in the cart
			require_once('models/cart.php');
			$cart = new CartModel();
			$data = $cart->getCartItems($_SESSION['username']);

			// get the user's shipping information
			require_once('models/user.php');
			$userModel = new UserModel();
			$user = $userModel->getUser($_SESSION['username']);
			$user = $user[0];

		} else {
			$error_message = "Please log in to place an order!";
		}
		require_once('views/checkout.php');
	}

	public function submit() {
		// figure out which card to use new or existing
		if($_POST['credit-card'] === 'new') {
			$cc_type = $_POST['cc-type'];
			$cc_number = $_POST['new-cc-number'];

			if(is_numeric($cc_number)) {
				require_once('models/user.php');
				$userModel = new UserModel();
				$userModel->updateCreditCard($cc_type, $cc_number);
			}
			else {
				$error_message = "Please enter a valid credit card number.";
				$this->checkout($error_message);
			}
		}

		// get the user info
		require_once('models/user.php');
		$user_model = new UserModel();
		$user = $user_model->getUser($_SESSION['username']);

		// create a new order
		require_once('models/cart.php');
		$cart = new CartModel();
		$id = $cart->placeOrder($user);
		// echo $order_id;
		//create line items for each book in the cart
		$cart->addLineItems($id);

		$this->receipt($id);
	}

	public function receipt($order_id) {
		
		if (isset($_SESSION['username'])) {
			require_once('models/orders.php');
			$model = new OrderModel();
			$order = $model->getOrderedItems($_SESSION['username'], $order_id);
						
			$total = 0.0;
			foreach($order as $item) {
				
				echo $item['isbn'];
				echo $item['title'];
				echo $item['unit_price'];
				echo $item['quantity'];
				$total += $item['unit_price'] * $item['quantity'];
			}

			echo $total;
			echo $order_id;

			$data['total'] = $total;
			$data['items'] = $order;

			require_once('models/user.php');
			$userModel = new UserModel();
 			$user = $userModel->getUser($_SESSION['username']);
			// $data['user'] = $user[0];
			$user = $user[0];
			require_once('views/receipt.php');
		}
	}
}