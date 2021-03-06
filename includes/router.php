<?php
/*
	This file simply reads the URL and loads the appropriate controller.
	If the controller is followed by a method, it executes that method,
	otherwise it executes the default method of index()
	Example:

		www.site.com/users/add

		would create an instance of the users controller class and
		then execute its add() method.
*/

if (isset($_SERVER['REQUEST_URI']) && strlen($_SERVER['REQUEST_URI']) > 1) {
	$segments = explode('/' , $_SERVER['REQUEST_URI']);
	// build our class name from URL and load its file
	$controller = explode('?', $segments[1]);
	$controller = $controller[0];
	$controller_path = "controllers/$controller.php";
	if (file_exists($controller_path)) {
		require_once($controller_path);
	}
	else {
		require_once("controllers/BaseController.php");
		$page = new BaseController();
		$page->missing_controller();
		return;
	}

	// instantiate new controller
	$page = new $controller();

	// check for method in URL or set default method as index()
	if (sizeof($segments) > 2 && $segments[2] ){
		$method = explode('?', $segments[2]);
		$method = $method[0];
	}
	else
		$method = 'index';

	// check for method parameter in URL
	if (sizeof($segments) > 3 && $segments[3] ){
		$param = $segments[3];
	}
	else
		$param = '';


	//security check that method exists and execute
	if(method_exists($page, $method))
		$page->$method($param);
	else
		$page->missing_controller();

} else
	include_once('home.php');
