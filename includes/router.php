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
	$controller = $segments[1];
	require_once('controllers/' . $controller . '.php');

	// instantiate new controller
	$page = new $controller();

	// check for method in URL or set default method as index()
	if (sizeof($segments) > 2 && $segments[2] ){
		$method = explode('?', $segments[2]);
		$method = $method[0];
	}
	else
		$method = 'index';

	//security check that method exists and execute
	if(method_exists($page, $method))
		$page->$method();

} else
	include_once('home.php');
