<?php

/**
 *  Maps requests to a relevent controller.
 *  Any requests that are not mapped here will default
 *  to the Error404Controller.
 */
class Routes {
	/** The array of routes */
	public $routes;
	
	/**
	 * Maps requests to controllers
	 */
	function __construct() {
		$homeController = new HomeController();
		$this->routes[''] = $homeController;
		$this->routes['home'] = $homeController;
		$this->routes['404'] = new Error404Controller();
	}
}

?>