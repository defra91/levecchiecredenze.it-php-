<?php

include_once("../controller/ImageController.php");
include_once("../../Configuration.php");
include_once("MySqlDatabase.php");
include_once("../utils/Error.php");

/**
* This class provides a connection to the database and manage images
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class ImageModel {
	
	/**
	* Public class constructor
	* @access public
	**/
	function __construct() {
		$config = Configuration::getMysqlConfiguration();

		$this->database = new MySqlDatabase(
			$config['dbHost'],
			$config['dbUser'],
			$config['dbPassword'],
			$config['dbName'],
			$config['dbPort']
		);  
	}

	/**
	* Extract all images in database
	* @access public
	* @static
	*/
	public static function selectAll() {
		$query = "select * from immagini";
		try {
			$database = new MySqlDatabase(
				$config['dbHost'],
				$config['dbUser'],
				$config['dbPassword'],
				$config['dbName'],
				$config['dbPort']
			);
			$connection = $database->dbConnect();
			$images = $database->executeQuery($query, $connection);
			return $images;
		}
		catch (Error $e) {
			$e->printHtmlError();
			$e->reportOnGitHub(array("mysql error", "image"));
		}
	}
}

?>