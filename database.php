<?php

/**
 *  Allows access to the database.
 *  This class mainly just contains the db details and a PDO instance.
 */
class Database {
	/** The PDO instance. */
	public $PDO;

	function __construct() {
		/** MySQL database details */
		$DB_HOST     = "";
		$DB_NAME 	 = "";
		$DB_USERNAME = "";
		$DB_PASSWORD = "";
		
		$this->PDO = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	}
}	
?>