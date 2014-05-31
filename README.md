# levecchiecredenze.it - a website php project

This repository provide a versioning system for the website levecchiecredenze.it.

* Public domain reference: <http://www.levecchiecredenze.it> (not deployed yet, old version)

## Status

Under development. See the [release](https://github.com/defra91/levecchiecredenze.it/releases) section for more information;

## Current features

* Static homepage with restaurant information;
* Static page with history of restaurant information;
* Dynamic page with restaurant menu (not implemented);
* Dynamic page with news list;
* Dynamic page with event list (not implemented);
* Dynamic page with gallery (not implemented);
* Static page with driving information and google maps frame;
* Static page with form for contact;
* Static page with credits information;
* Static page with login form;
* Standard error page view;

## Standard and references

* XHtml standard: <http://www.w3.org/TR/xhtml1/>
* CSS2 standard: <http://www.w3.org/TR/CSS2/>
* Javascript reference: <http://www.w3schools.com/jsref/>

## Project structure

The project strictly follows the MVC design pattern. The public pages are picked on the directory `public_html`, within which reside the following directories:

* `images/`, where content images are stored;
* `css/`, where css stylesheet are stored;
* `js/`, where Javascript client-side scripts are stored;
* `data/`, where documents and other binary stuff are stored;

The `resources` directories contains all the back-end. It contains the directory `library` where are stored php scripts. The `library` directory's structure is shown below:

* `model/`, which contains script for database management;
* `controller/`, which contains script to generate page sections and communicate with model;
* `utils/`, which contains other php classes;
* `vendor/`, which contains external libraries from package manager composer;ù
* `composer.json` file, which contains the description of the package;

You can also find `backup/` directory inside `resources` folder. It contains all backup files, such as mysql backups.

## Requirements

* PHP >= 5.3.2 with [cURL](http://php.net/manual/en/book.curl.php) extension;
* [Composer](https://getcomposer.org/);
* [MySQL](https://www.mysql.it/) database;

## First use

To make the website working you need to follow the following steps:

* First of all you need to create a php configuration file class. Open a terminal and access to project's directory. You need to create a file named `Configuration.php` inside the path `./resources/`. You can run the following command:

`touch ./resources/Configuration.php`

* Write class code insisde `Configuration.php` file. You are free to setup your file as you wish but in order to make project working you need to follow the template shown below:

``` php

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
			"name" => "yourName",
			"surname" => "yourSurname",
			"email" => "yourEmail"
		);
	}	

	/**
	* Returns hash with project configuration
	* @return hash project configuration info
	* @access public
	*/
	public static function getProjectConfiguration() {
		return array(
			// notice: github configuration is optional
			"githubUrl" => "yourGithubUrl",
			"githubRepositoryName" => "yourRepositoryName", // your forked project
			"githubUsername" => "yourGithubUsername",
			"githubPassword" => "yourGithubPassword", // need to automatically create issues
			"publicDomain" => "(optional) yourSitePublicDomain",
			"documentRoot" => $_SERVER['DOCUMENT_ROOT'];
		);
	}

	/**
	* Returns description of mysql database configuration 
	* @return hash mysql configuration info
	*/
	public static function getMysqlConfiguration() {
		return array(
			"dbHost" => "dbHost",
			"dbUser" => "dbUser",
			"dbPassword" => "dbPass",
			"dbName" => "dbName",
			"dbPort" => "dbPort"	// usually 3606
		);
	}

	/**
	* Public class constructor
	* @access private
	*/
	private function __construct() {}
}

?>

```

* Import database tables structure by file upload. You can find the backup file in the following path: `./resources/backup/mysqlBackup.sql`.

## Programs and tools used:

* Operating system: [Ubuntu 14.04](http://www.ubuntu-it.org/download);
* Text editor: [sublime Text 3](http://www.sublimetext.com/3);
* Server web: [Apache 2.*](http://httpd.apache.org/);
* MySql management: [MySql Workbench](http://www.mysql.it/products/workbench/);

## External libraries used:

* [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle);
* [knplabs/github-api](https://packagist.org/packages/knplabs/github-api);
* [nesbot/Carbon](https://packagist.org/packages/nesbot/carbon);
* [hisorange/browser-detect](https://packagist.org/packages/hisorange/browser-detect);