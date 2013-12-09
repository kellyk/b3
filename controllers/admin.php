<?php
require_once('BaseController.php');

class Admin extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// load the view
		$this->_admin_skin('views/admin/blank.php');
	}

	public function login($message) {
		$message = urldecode($message);
		require_once('views/admin/login.php');
	}

/**************** Catalog manipulation  sub pages *************************/
	public function catalog() {
		$this->_admin_skin('views/admin/catalog.php');
	}

	public function add_edit($isbn) {
		$this->_admin_skin('views/admin/add_edit.php');
	}

	public function create_book() {
		require_once('models/book.php');
		require_once('models/author.php');
		require_once('models/review.php');
		$bookModel = new BookModel();
		$authorModel = new AuthorModel();
		
		
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
		
		header('Location: ' . SITE_ROOT . 'admin/catalog');
	}

	public function update_book() {

	}
/***************************************************************************/
	
	public function search() {
		$this->_admin_skin('views/search.php');
	}

	public function search_results() {
		$this->_admin_skin('views/admin/search_results.php');
	}

	public function orders() {
		$this->_admin_skin('views/admin/orders.php');
	}

	public function reports() {
		$this->_admin_skin('views/admin/reports.php');
	}

	public function profile() {
		$this->_admin_skin('views/admin/profile.php');
	}

	public function logout() {
		// log user out and redirect to homepage
		session_destroy();
		header( 'Location: ' . SITE_ROOT . 'admin');
	}

	public function _admin_skin($view) {
		if ($_SESSION['administrator'] != 1) {
			header('Location: ' . SITE_ROOT . 'admin/login');
			exit();
		}
		require_once('views/admin/dashboard.php');
		require_once($view);
		require_once('views/global/footer.php');
	}
}
