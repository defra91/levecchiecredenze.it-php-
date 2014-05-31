<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/Configuration.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/MySqlDatabase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/Error.php");


/**
* Provides a connection to the database and manage news
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class NewsModel {
	
	/**
	* Public class constructor
	* @access public
	*/
	public function __construct() {
		$config = Configuration::getMysqlConfiguration();
		try {
			$this->database = new MySqlDatabase(
				$config['dbHost'],
				$config['dbUser'],
				$config['dbPassword'],
				$config['dbName'],
				$config['dbPort']
			);
			$this->connection = $this->database->dbConnect();
		}
		catch (Error $e) {
			$e->printHtmlError();
			$e->reportOnGitHub(array("mysql error", "news"));
		}
	}

	/**
	* Extract all the images from the database in a static way
	* @access public
	* @return Array array containing all news
	*/
	public function selectAll() {
		try {
			$query = "select * from news";
			$result = $this->database->executeQuery($query, $this->connection);
			$i = 0;
			$news = array();
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$news[$i] = $row;
				$i++;
			}
			return $news;
		}
		catch (Error $e) {
			$e->printHtmlError();
			$e->reportOnGitHub(array("mysql error", "news"));
		}
	}
}

?>