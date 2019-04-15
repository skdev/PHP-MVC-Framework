<?php

/**
 *  This is the controller for 404 errors
 */
class Error404Controller extends AbstractController {
	
	/**
	 *  Loads the 404.php view
	 */
	function getView() {	
		return "404.php";
	}
	
	/**
	 *  Data for the view
	 */
	function getData() {
	}
	
}

?>