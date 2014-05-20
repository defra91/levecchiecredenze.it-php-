<?php
include_once("../controller/AccessController.php");
include_once("MySqlDatabase.php");
include_once("../controller/Configuration.php");
include_once("../controller/Error.php");

/**
* Provides connection with database and manage access data
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class AccessModel {
	
	/**
	* Public class constructor
	* @param AccessController $controller Access controller with information
	* @access public
	*/
	public function __construct($controller) {
		$this->accessController = $controller;
		$dbConfiguration = Configuration::getMySqlInformation();
		// initialize database with data configuration
		$this->database = new MySqlDatabase(
			$config['dbHost'],
			$config['dbUser'],
			$config['dbPassword'],
			$config['dbName'],
			$config['dbPort']
		);
	}

	/**
	* Communicate with database and register access
	* @access public
	*/
	public function registerAccess() {
		$query = "insert into access values(
			null,
			\"" . $this->accessController->getAccessDatetime() .
			"\", \"" . $this->accessController->getAccessBrowser() .
			"\", \"" . $this->accessController->getAccessOS() .
			"\", \"" . $this->accessController->getAccessBroadcastAddress() .
			"\", \"" . $this->accessController->getAccessDeviceType() .
			"\", \"" . $this->accessController->getAccessDeviceFamily() .
			"\", \"" . $this->accessController->getAccessDeviceModel() .
			"\")";
		try {
			$connection = $this->database->dbConnect();
			$this->database->executeQuery($query, $connection);
		}
		catch (Error $e) {
			$e->printHtmlError();
			$e->reportOnGithub(array("mysql error", "access"));
		}
	
	}
}

?>