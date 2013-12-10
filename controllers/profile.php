<?php
require_once('BaseController.php');

class Profile extends BaseController {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if (isset($_SESSION['username'])) {
			//all fields are required, so if the first one is populated, we can proceed

			// we will probably want to validate that the pins match at some point
			require_once('models/user.php');
			$userModel = new UserModel();
			$user = $userModel->getUser($_SESSION['username']);
			$user = $user[0];

			require_once('views/profile.php');
		} else {
			$this->register();
		}
	}

	public function register() {
		if (isset($_POST['username'])) {
			//all fields are required, so if the first one is populated, we can proceed

			// we will probably want to validate that the pins match at some point
			require_once('models/user.php');
			$user = new UserModel();

			//check if username is taken. If not proceed.
			$nameAvailable = $user->checkDuplicateUsername($_POST['username']);

			// check credit cards is a number (not a string)
			$validCreditCard = is_numeric($_POST['card_number']);

			// check if pins are numbers
			$numericPin = (is_numeric($_POST['pin']) && is_numeric($_POST['repin']));

			// check if pins match
			$pinMatch = $this->checkPinMatch($_POST['pin'], $_POST['repin']);

			if ($nameAvailable && $validCreditCard && $numericPin && $pinMatch) {
				$success = $user->createUser($_POST);

				if ($success) { // user successfully registered -- direct to search page
					$success_message = "Thanks, " . $_POST['firstname'] . ', your profile has been successfully created!';
					$_SESSION['logged_in'] = 1;
					$_SESSION['username'] = $_POST['username'];
					require_once('views/search.php');
				} else { // error -- take back to registration form
					$error_message = "Sorry, something went wrong. Please try again later.";
					require_once('views/register.php');
				}
			} else { // If one or more of the entries was invalid, return them to registration form
				// $error_message = "Sorry, the username {$_POST['username']} is taken. Please pick a new name and resubmit.";
				$error_message = $this->buildErrorString($nameAvailable, $validCreditCard, $numericPin, $pinMatch);
				require_once('views/register.php');
			}

		} else { // first time user hits registration page -- no POST data
			require_once('views/register.php');
		}
	}

	private function checkPinMatch($pin1, $pin2) {
		return ($pin1 === $pin2);
	}

	private function buildErrorString($nameAvailable, $validCreditCard, $numericPin, $pinMatch) {
		$errors = array();

		if (!$nameAvailable) {
			array_push($errors, "Username {$_POST['username']} is already taken.");
		}

		if (!$validCreditCard) {
			array_push($errors, "Credit card must be a numeric value.");
		}

		if (!$pinMatch) {
			array_push($errors, "Pins did not match.");
		}

		if (!$numericPin) {
			array_push($errors, "Pins must be a numeric value between 4 and 6 characters.");
		}

		return join("<br />", $errors);
	}

}