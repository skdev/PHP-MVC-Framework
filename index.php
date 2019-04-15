<?php
	/** Start a session if there is not currently an active one */
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	/** Global variables */
	$BASE = "http://" . $_SERVER['SERVER_NAME'] . "/portal/index.php";
	$BASE_ASSETS = "http://" . $_SERVER['SERVER_NAME'] . "/portal";
	
	/** Automatically loads all the controllers from 'controllers' directory */
	foreach (glob("controllers/*Controller*.php") as $controller) {
		include_once $controller;
	}

	/** Automatically loads all the models from 'models' directory */
	foreach (glob("models/*Model*.php") as $controller) {
		include_once $controller;
	}
	
	/** Load routes */
	include "routes.php";
	$routes = new Routes();

	/** Parse the URL to figure out the request */
	$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	$arr = explode('index.php/', $path);
	
	/** The request */
	$request = isset($arr[1]) ? $arr[1] : "";
	
	/**
	 * Fixes issue with URL's ending in '/' and system not being able to find route.
	 * Basically; if the URL ends with '/' - we remove it (this won't be shown in browser)
	 */
	$expectedPosition = strlen($request) - strlen('/');
	$endsWithSlash = strripos($request, '/', 0) === $expectedPosition;
	if($endsWithSlash) {
		$request = substr($arr[1], 0, -1);
	}
	
	/**
	 * If no route found for request, display error 404
	 */
	if(!isset($routes->routes[$request])) {
		$controller = $routes->routes['404'];	
		$_SESSION['data'] = $controller->getData();
		$_SESSION['pageContents'] = "view/" . $controller->getView();
		include("view/template.php");	
		return;
	}

	/** Loads controller and appropirate view */
	$controller = $routes->routes[$request];	
	
	/** If view ends with '.php' load the php file otherwise find the corrosponding controller */
	$view = $controller->getView();
	
	/** Gets corrosponding .php file and display view */
	$expectedViewPosition = strlen($view) - strlen('.php');
	$viewIsPhp = strripos($view, '.php', 0) === $expectedViewPosition;
	if($viewIsPhp) {
		$_SESSION['data'] = $controller->getData();
		$data = $_SESSION['data'];
		$_SESSION['pageContents'] = "view/" . $controller->getView();
		include("view/template.php");
		return;
	}
	
	/** Remove .php from the view so we can search by name */
	$view = str_replace(".php", "", $view);
		
	/** Get corrosponding controller and display view */	
	$controller_ = $routes->routes[$view];
	$_SESSION['data'] = $controller_->getData();
	$data = $_SESSION['data'];
	$_SESSION['pageContents'] = "view/" . $controller_->getView();
	include("view/template.php");
?>