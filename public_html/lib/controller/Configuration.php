<?php

/**
* This class provides to describe a series of configuration in a static way
*/
class Configuration {
	
	/**
	* This hash describes the configuration of the project manager
	*/
	public static function getDeveloperConfiguration() {
		return array(
			"name" => "Luca",
			"surname" => "De Franceschi",
			"email" => "luca.defranceschi.91@gmail.com"
		);
	}	

	/**
	* This hash describes the project configuration
	*/
	public static function getProjectConfiguration() {
		return array(
			"githubUrl" => "",
			"githubRepositoryName" => "",
			"githubUsername" => "",
			"githubPassword" => "",
			"publicDomain" => ""
		);
	}

	/**
	* This hash describes the mysql database configuration
	*/
	public static function getMysqlConfiguration() {
		return array(
			"dbHost" => "",
			"dbUser" => "",
			"dbPassowrd" => "",
			"dbName" => "",
			"dbPort" => ""
		);
	}

	/**
	* The class constructor
	*/
	function __construct() {}
}

?>