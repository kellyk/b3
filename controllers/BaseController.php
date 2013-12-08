<?php
class BaseController {
	public function __construct() {
		
	}

	public function missing_controller() {
		require_once('views/404.php');
	}
}
?>
