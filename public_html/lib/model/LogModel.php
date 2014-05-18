<?php

include_once("../controller/LogController");
include_once("MySqlDatabase.php");
include_once("../controller/Configuration.php");
include_once("../controller/Error.php");

/**
* Provides a model for Log and comunicate with database to store, edit, load and delete data
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
* 
*/
class LogModel {

	/**
	* Public class constructor
	* @param LogController the controller for the log
	* @access public
	*/
	public function __construct($controller) {
		$this->logController = $controller;
		$config = Configuration::getMysqlConfiguration();
		// Initialize database with data configuration
		$this->database = MySqlDatabase->new(
			$config['dbHost'],
			$config['dbUser'],
			$config['dbPassword'],
			$config['dbName'],
			$config['dbPort']
		);
	}

	/**
	* Communicate with database and store the Log
	*/
	public function registerLog() {
		$query = "insert into log values(
			null, " .
			$this->logController->getLogUser() .
			", " . $this->logController->getLogCategory() .
			", " . $this->logController->getLogDescription() .
			", " . $this->logController->getLogDatetime() .
			");";
		try {
			$connection = $database->dbConnect();
		}
		catch (Error $e) {
			$e->printHtmlError()
		}
		
		
	}
} 