<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/Configuration.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/Error.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/controller/SubscriptionController.php")
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/MySqlDatabase.php");

/**
* Provides management of subscription in the database
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class SubscriptionModel {
	
	/**
	* Public class constructor
	* @access public
	*/
	public function __construct() {
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
	* Insert subscribtion in the database
	* @param Subscription subscription information
	* @access public
	*/
	public function insertSubscription($subscription) {
		try {
			$connection = $this->database->dbConnect();
			$query = "insert into iscrizioni values(
				null, ".
				$subscription->getName() .
				", " . $subscription->getSurname() .
				", " . $subscription->getEmail() . 
				", now(), 0)";
			$this->database->executeQuery();
		}
		catch (Error $e) {
			$e->reportOnGitHub(array("mysql error", "subscribe.php"));
			throw $e;
			
		}
	}

	/**
	* Verify if email address is already present in the database
	* @param String $email email address
	* @return Bool specify if the email address exists or not
	* @access public
	*/
	public function verifyEmailExistence($email) {
		try {
			$connection = $this->database->dbConnect();
			$query = "select from iscrizioni where email = \"" . $email . "\"";
			$result = $this->database->executeQuery($query, $connection);
			if (empty($result) || is_null($result) {
				return false;
			}
			else {
				return true;
			}
		}
		catch (Error $e) {
			$e->reportOnGitHub();
		}
	}




}

?>