<?php
include_once("../utils/Error.php");
/**
* Provides operations for mysql database
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class MySqlDatabase
{
	/**
	* Public class constructor
	* @param string $dbHost the location where database is hosted
	* @param string $dbUser the user of the database
	* @param string $dbPassword the password of the user
	* @param string $dbName the name of the database
	* @param integer $dbPort the port where database is listening
	* @access public
	*/
	public function __construct($dbHost, $dbUser, $dbPassword, $dbName, $dbPort) {
		$this->dbHost = $dbHost;
		$this->dbUser = $dbUser;
		$this->dbPassword = $dbPassword;
		$this->dbName = $dbName;
		$this->dbPort = $dbPort;
	}

	/**
	* Returns the database host
	* @return string database host
	* @access public
	*/
	public function getDbHost() {
		return $this->dbHost;
	}

	/**
	* Returns the database user
	* @return string database user
	* @access public
	*/
	public function getDbUser() {
		return $this->dbUser;
	}

	/**
	* Returns the value of user's password
	* @param string database user's passoword
	* @access public
	*/
	public function getDbPassword() {
		return $this->dbPassword;
	}

	/**
	* Returns the database name
	* @return string database name
	* @access public
	*/
	public function getDbName() {
		return $this->dbName;
	}

	/**
	* Connect to the database
	* @return MysqlConnection the connection handler to the database
	* @access public
	* @throws Error when unable to connect to MySql database
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

	/**
	* Executes query
	* @param string $query query to be executed
	* @param MySqlConnection mysql connection to the database
	* @return MySqlQueryResult the query result
	* @throws Error when query execution fails
	* @access public
	*/
	public function executeQuery($query, $connection) {
		$result = mysqli_query($connection, $query);
		if ($result) {	// query executed with success
			return $result;
		}
		else { // an error occured, throw error
			throw(new Error(2001, "An error occured while executing query", mysqli_error($connection)));
		}

	}
}

?>