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

	public function update_book() {

	}
/***************************************************************************/
	
	public function search() {
		require_once('views/admin/search.php');
	}

	public function search_results() {
		require_once('models/adminsearch.php');
		$model = new AdminSearchModel();

		$searchFor = $_POST['searchFor'];
		$searchIn = $_POST['searchIn'];
		$category = $_POST['category'];

		$data = $model->getData($searchFor, $searchIn, $category);

		// load the view
		require_once('views/admin/search_results.php');


		//$this->_admin_skin('views/admin/search_results.php');
	}

	public function orders() {
		$this->_admin_skin('views/admin/orders.php');
	}

	public function reports() {
		
		// this counts the sessions within in a given idletime

		define("MAX_IDLE_TIME", 3); 
		
		$count = 0;
		
		if ( $directory_handle = opendir( session_save_path() ) ) { 
			 echo readdir($directory_handle);
			while ( false !== ( $file = readdir( $directory_handle ) ) ) { 
				if($file != '.' && $file != '..'){ 
					if(time()- fileatime(session_save_path() . '\\' . $file) < MAX_IDLE_TIME * 60) { 
						$count++; 
					} 
				} 
				closedir($directory_handle); 
			}
			
		} else { 
			echo "cannot read session_save_path ";
			echo session_save_path(); 
	} 
		
		require_once('models/reports.php');
		$model = new ReportsModel();
		$books = $model->getBooksByCategoryTotalNumberDesc();

		// foreach ($books as $category) {
		// 	echo $category['category'];
		// 	echo $category['books_count'];
		// }


		$sales = $model->getAvgSalesPerMonth();
		// foreach ($sales as $month) {
		// 	echo $month['sumOrders'];
		// 	echo date("F", mktime(0, 0, 0,$month['month'], 10)); 
		// }

		
		require_once('views/admin/reports.php');
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
