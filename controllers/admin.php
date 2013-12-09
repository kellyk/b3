<?php
require_once('BaseController.php');
require_once('models/book.php');
require_once('models/author.php');
require_once('models/review.php');
require_once('models/user.php');

class Admin extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// load the view
		$this->_admin_skin('views/admin/blank.php', $args);
	}

	public function login($message) {
		$message = urldecode($message);
		require_once('views/admin/login.php');
	}

/**************** Catalog manipulation  sub pages *************************/
	public function catalog() {
		$this->_admin_skin('views/admin/catalog.php', $args);
	}

	public function add_edit($isbn) {
		$bookModel = new BookModel();
		$authorModel = new AuthorModel();
		$reviewModel = new ReviewModel();

		$args;
		if ($isbn) {
			$books = $bookModel->getBookByISBN($isbn);
		}
		if ($books[0]) {
			$book = $books[0];
			$reviews = $reviewModel->getReviews($isbn);
			$authors = $authorModel->getByISBN($isbn);
			$args = array(
				"isbn"    => $isbn,
				"book"    => $book,
				"reviews" => $reviews,
				"authors" => $authors
			);
		}
		$this->_admin_skin('views/admin/add_edit.php', $args);
	}

	public function create_book() {
		if ($_SESSION['administrator'] != 1) {
			header('Location: ' . SITE_ROOT . 'admin/login');
			exit();
		}
		$bookModel = new BookModel();
		$authorModel = new AuthorModel();
		$reviewModel = new ReviewModel();
		
		foreach (array_keys($bookModel->book_def) as $col) {
			if (isset($_POST[$col]) && $_POST[$col] != '') {
				$args[$col] = $_POST[$col];
			}
		}

		$bookModel->createBook($args);

		$count = 1;
		while ($_POST["firstName$count"] || $_POST["lastName$count"]) {
			$fname = $_POST["firstName$count"];
			$lname = $_POST["lastName$count"];
			$authors = $authorModel->getByName($fname, $lname);
			if (!$authors[0]) {
				$authorModel->create(array(
					"first_name" => $fname,
					"last_name"  => $lname,
				));

				$authors = $authorModel->getByName($fname, $lname);
			}

			$author = $authors[0];
			$authorModel->addWrote(array(
				"isbn"      => $_POST['isbn'],
				"author_id" => $author['id'],
			));	
			
			$count++;
		}

		$count = 1;
		while ($_POST["review$count"]) {
			$reviewModel->create(array(
				"isbn"        => $_POST['isbn'],
				"review_text" => $_POST["review$count"],
			));
			$count++;
		}
		
		header('Location: ' . SITE_ROOT . 'admin/catalog');
	}

	public function delete_book($isbn) {
		if ($_SESSION['administrator'] != 1) {
			header('Location: ' . SITE_ROOT . 'admin/login');
			exit();
		}

		$bookModel = new BookModel();
		$bookModel->update($isbn, "deleted", 1);
		header('Location: ' . SITE_ROOT . 'admin/search');
	}

	public function activate_book($isbn) {
		if ($_SESSION['administrator'] != 1) {
			header('Location: ' . SITE_ROOT . 'admin/login');
			exit();
		}

		$bookModel = new BookModel();
		$bookModel->update($isbn, "deleted", 0);
		header('Location: ' . SITE_ROOT . 'admin/search');
	}

	public function update_book() {
		if ($_SESSION['administrator'] != 1) {
			header('Location: ' . SITE_ROOT . 'admin/login');
			exit();
		}
		$bookModel = new BookModel();
		$authorModel = new AuthorModel();
		$reviewModel = new ReviewModel();
		
		$book = $bookModel->getBookByISBN($_POST['isbn']);
		$authors = $authorModel->getByISBN($_POST['isbn']);
		$reviews = $reviewModel->getReviews($_POST['isbn']);
		$book = $book[0];

		if ($book) {
			foreach (array_keys($bookModel->book_def) as $col) {
				if (isset($_POST[$col]) && $_POST[$col] != $book[$col]) {
					$bookModel->update($book['isbn'], $col, $_POST[$col]);
				}
			}

			foreach ($authors as $author) {
				$authorModel->removeWrote($author['id'], $book['isbn']);
			}

			$count = 1;
			while ($_POST["firstName$count"] || $_POST["lastName$count"]) {
				$fname = $_POST["firstName$count"];
				$lname = $_POST["lastName$count"];
				$authors = $authorModel->getByName($fname, $lname);
				if (!$authors[0]) {
					$authorModel->create(array(
						"first_name" => $fname,
						"last_name"  => $lname,
					));
	
					$authors = $authorModel->getByName($fname, $lname);
				}

				$author = $authors[0];
				$authorModel->addWrote(array(
					"isbn"      => $_POST['isbn'],
					"author_id" => $author['id'],
				));	
				
				$count++;
			}

			foreach ($reviews as $review) {
				$reviewModel->delete($review['review_number']);
			}

			$count = 1;
			while (isset($_POST["review$count"])) {
				$reviewModel->create(array(
					"isbn"        => $_POST['isbn'],
					"review_text" => $_POST["review$count"],
				));
				$count++;
			}
		}
		header('Location: ' . SITE_ROOT . 'admin/catalog');
	}
/***************************************************************************/

	public function orders() {
		require_once('models/orders.php');
		$orderModel = new OrderModel();
		$bookModel  = new BookModel();
		
		$args['orders'] = $orderModel->getOrdersDetails();
		$args['needs']  = $bookModel->inventoryNeeded();

		$this->_admin_skin('views/admin/orders.php', $args);
	}

	public function order($isbn) {
		$bookModel = new BookModel();

		$books = $bookModel->getBookByISBN($isbn);
		$bookModel->update($isbn, "inventory_quantity", $books[0]['inventory_minimum']);
		header('Location: ' . SITE_ROOT . "admin/orders");
	}


	public function shipped($order_number) {
		require_once('models/orders.php');
		$orderModel = new OrderModel();

		$orderModel->ship($order_number);
		header('Location: ' . SITE_ROOT . 'admin/orders');
	}

	public function cancel($order_number) {
		require_once('models/orders.php');
		$orderModel = new OrderModel();

		$orderModel->cancel($order_number);
		header('Location: ' . SITE_ROOT . 'admin/orders');
		
	}
	
	public function search() {
		$this->_admin_skin('views/search.php', $args);
	}

	public function search_results() {
		require_once('models/search.php');
		$model = new SearchModel();

		$searchFor = $_POST['searchFor'];
		$searchIn = $_POST['searchIn'];
		$category = $_POST['category'];

		$data = $model->getData($searchFor, $searchIn, $category);

		// load the view
		$this->_admin_skin('views/search_results.php', $data);


		//$this->_admin_skin('views/admin/search_results.php');
	}

	public function reports() {
		require_once('models/reports.php');
		
		$count = 0;
		$model = new ReportsModel();
		$books = $model->getBooksByCategoryTotalNumberDesc();
		$sales = $model->getAvgSalesPerMonth();
		
		$args['books'] = $books;
		$args['sales'] = $sales;
		$args['count'] = $count;
		$this->_admin_skin('views/admin/reports.php', $args);
	}

	public function profile($username) {
		$userModel = new UserModel();
	
		$user = $userModel->getAdministrator($username);
		$args['user'] = $user[0];
		$this->_admin_skin('views/admin/profile.php', $args);
	}

	public function profile_update() {

		$userModel = new UserModel();
		$user = $userModel->getUser($_POST['username']);
		$user = $user[0];
		
		foreach (array_keys($userModel->user_def) as $col) {
			if (isset($_POST[$col]) && $_POST[$col] != $user[$col]) {
				if ($col == 'PIN' && $_POST[$col] != '*****') {
					$userModel->update($user['username'], $col, $_POST[$col]);
				}
				elseif ($col != 'PIN') {
					$userModel->update($user['username'], $col, $_POST[$col]);
				}
			}
		}

		header('Location: ' . SITE_ROOT . "admin");
	}

	public function profile_create() {
		$userModel = new UserModel();
		
		foreach (array_keys($userModel->user_def) as $col) {
			if (isset($_POST[$col]) && $_POST[$col] != '') {
				$args[$col] = $_POST[$col];
			}
		}

		$userModel->insert($args, "user");
		$userModel->insert(array("username" => $_POST['username'], "hire_date" => $_POST['hire_date']), "administrator");
		header('Location: ' SITE_ROOT . "admin");
	}

	public function logout() {
		// log user out and redirect to homepage
		session_destroy();
		header( 'Location: ' . SITE_ROOT . 'admin');
	}

	public function _admin_skin($view, $args) {
		if ($_SESSION['administrator'] != 1) {
			header('Location: ' . SITE_ROOT . 'admin/login');
			exit();
		}
	
		$args = $args;	
		$data = $args;
		require_once('views/admin/dashboard.php');
		require_once($view);
		require_once('views/global/footer.php');
	}
}
