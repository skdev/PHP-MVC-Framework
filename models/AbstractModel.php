<?php

include "database.php";

/**
 *  Base class for all Models.
 *  Models all have access to the static Database object.
 */
abstract class AbstractModel {
	/**
	 *  The Database object singleton.
	 *  
	 *  This is a singleton because we do not want to create
	 *  multiple connections to the database and instead have 1 shared 
	 *  open connection.
	 */
	private static $database = null;
	
	/**
	 * Gets the Database object.
	 * This function does lazy initilisation for the Database
	 * object.
	 */
	public static function getDatabase() {
    if (self::$database == null) {
      self::$database = new Database();
    }
    return self::$database;
  }
}
?>