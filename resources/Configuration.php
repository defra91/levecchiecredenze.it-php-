<?php

/**
* This class provides to describe a series of configuration in a static way
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class Configuration {
	
	/**
	* Returns hash with developer information
	* @return hash developer info
	* @access public
	*/
	public static function getDeveloperConfiguration() {
		return array(
			"name" => "Luca",
			"surname" => "De Franceschi",
			"email" => "luca.defranceschi.91@gmail.com"
		);
	}	

	/**
	* Returns hash with project configuration
	* @return hash project configuration info
	* @access public
	*/
	public static function getProjectConfiguration() {
		return array(
			"githubUrl" => "https://github.com/defra91/levecchiecredenze.it",
			"githubRepositoryName" => "levecchiecredenze.it",
			"githubUsername" => "defra91",
			"githubPassword" => "multisync91",
			"publicDomain" => "http://www.levecchiecredenze.it",
			"documentRoot" => $_SERVER['DOCUMENT_ROOT'];
		);
	}

	/**
	* Returns description of mysql database configuration 
	* @return hash mysql configuration info
	*/
	public static function getMysqlConfiguration() {
		return array(
			"dbHost" => "localhost",
			"dbUser" => "root",
			"dbPassword" => "pass",
			"dbName" => "local",
			"dbPort" => "3306"
		);
	}

	/**
	* Public class constructor
	* @access private
	*/
	private function __construct() {}
}

?>