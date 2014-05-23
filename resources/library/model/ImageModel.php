<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/controller/ImageController.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/Configuration.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/MySqlDatabase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/Error.php");

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
	* @return hash hash of extracted images
	* @static
	*/
	public static function selectAll() {
		$config = Configuration::getMysqlConfiguration();
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
			$result = $database->executeQuery($query, $connection);
			$i = 0;
			$images = array();
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$images[$i] = $row;
				$i++;
			}
			return $images;
		}
		catch (Error $e) {
			$e->printHtmlError();
			$e->reportOnGitHub(array("mysql error", "image"));
		}
	}
}

?>