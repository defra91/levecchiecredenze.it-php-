<?php
include_once("../controller/Error.php");
/**
* This class provides operations for mysql database
*/
class MySqlDatabase
{
	/**
	* This is the public constructor of the class
	*/
	public function __construct($dbHost, $dbUser, $dbPassword, $dbName, $dbPort) {
		$this->dbHost = $dbHost;
		$this->dbUser = $dbUser;
		$this->dbPassword = $dbPassword;
		$this->dbName = $dbName;
		$this->dbPort = $dbPort;
	}

	/**
	* Returns the value of the data field dbHost
	*/
	public function getDbHost() {
		return $this->dbHost;
	}

	/**
	* Returns the value of the data field dbUser
	*/
	public function getDbUser() {
		return $this->dbUser;
	}

	/**
	* Returns the value of the data field dbPassword
	*/
	public function getDbPassword() {
		return $this->dbPassword;
	}

	/**
	* Returns the value of the data field dbName
	*/
	public function getDbName() {
		return $this->dbName;
	}

	/**
	* Connect to the database
	*/
	public function dbConnect() {
		$connection = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName, $this->dbPort);

		if (mysqli_connect_errno()) {
			throw new Error(2000, "Unable to connect to MySql server", mysqli_connect_error());
		}
		else {
			return $connection;
		}
	}
}

?>