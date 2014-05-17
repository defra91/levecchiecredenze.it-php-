<?php

/**
* This class provides to describe a series of configuration in a static way
*/
class Configuration {
	
	/**
	* This hash describes the configuration of the project manager
	*/
	private static $developerConfiguration = (
		"name" => "Luca",
		"surname" => "De Franceschi",
		"email" => "luca.defranceschi.91@gmail.com"
	);

	/**
	* This hash describes the project configuration
	*/
	private static $projectConfiguration = (
		"githubUrl" => "https://github.com/defra91/levecchiecredenze.it",
		"githubUser" => "defra91",
		"publicDomain" => "http://www.levecchiecredenze.it"
	);

	private static $mysqlConfiguration = (
		"dbHost" => "",
		"dbUser" => "",
		"dbPassowrd" => "",
		"dbName" => "",
		"dbPort" => ""
	);

	/**
	* The class constructor
	*/
	function __construct() {}

	/**
	* Returns the hash of the project manager configuration
	*/
	public static function getUserConfiguration() {
		return $developerConfiguration;
	}

	/**
	* Returns the hash of the mysql database configuration
	*/
	public static function getDbConfiguration() {
		return $mysqlConfiguration;
	}

	/**
	* Returns the hash of the project configuration
	*/
	public static function getProjectConfiguration() {
		return $projectConfiguration;
	}
	
}

?>