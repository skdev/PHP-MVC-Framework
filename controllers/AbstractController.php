<?php

/**
 *  Base controller for all controllers.
 */
abstract class AbstractController {	
	/**
	 * @return The view to show to the user
	 */
	abstract function getView();
	/**
	 * The data that needs to be passed the to view.
	 */
	abstract function getData();
}

?>