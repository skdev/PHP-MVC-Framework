<?php

/**
 *  The main index controller
 */
class HomeController extends AbstractController {
	
	/**
	 *  Show the index.php view
	 */
	function getView() {	
		return "index.php";
	}
	
	/**
	 *  Returns the data to be passed to the view.
	 */
	function getData() {		
		$data['time'] = date("h:i:sa");
		return $data;
	}
	
}

?>