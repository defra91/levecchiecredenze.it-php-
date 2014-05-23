<?php
require($_SERVER['DOCUMENT_ROOT'] . "resources/library/vendor/autoload.php");
include($_SERVER['DOCUMENT_ROOT'] . "resources/library/model/LogModel.php");
use Carbon\Carbon;
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/Error.php");

/**
* Provides a controller for the access to LogModel
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class LogController
{
	/**
	* Public class constructor
	* @access public
	* @param string $user the user who made the action
	* @param string $description description of the action
	* @param string $category the category of the action
	*/	
	public function __construct($user, $description, $category) {
		$this->user = $user;
		$this->description = $description;
		if (!isset($category)) {
			$this->category = "misc";
		}
		else {
			if ($category != "pageAccess" || $category != "edit" || $category != "insert" || $category != "delete") {
				$this->category = "misc";
			}
			else {
				$this->category = $category;
			}
		}
		$this->dateTime = Carbon::now();
		$this->model = new LogModel($this);
	}

	/**
	* Getter method for $user data field
	* @return string $user the user who made the action
	* @access public
	*/
	public function getLogUser() {
		return $this->user;
	}

	/**
	* Getter method for $description data field
	* @return string $description description of the action+
	* @access public
	*/
	public function getLogDescription() {
		return $this->description;
	}

	/**
	* Getter method for $category data field
	* @return string $category of the action
	* @access public
	*/
	public function getLogCategory() {
		return $this->category;
	}

	/**
	* Getter method for $datetime data field
	* @return DateTime $datetime date and time of the action
	* @access public
	*/
	public function getLogDatetime() {
		return $this->dateTime;
	}

	/**
	* Setter method for $user datafield
	* @param string $user the user who made the action
	* @access public
	*/
	public function setLogUser($user) {
		$this->user = $user;
	}

	/**
	* Setter method for $description datafield
	* @param string $description the description of the action
	* @access public
	*/
	public function setLogDescription($description) {
		$this->description = $description;
	}

	/**
	* Setter method for $category datafield
	* @param string $category the category of the action
	* @access public
	*/
	public function setLogCategory($category) {
		$this->category = $category;
	}

	/**
	* Setter method for $datetime datafield
	* @param DateTime $datetime the date and time of the action
	* @access public
	*/
	public function setLogDatetime($datetime) {
		$this->datetime = $datetime;
	}

	/**
	* Comunicate with model and register Log
	* @return Log the log registered
	* @access public
	*/
	public function registerLog() {
		$this->model->registerLog();	
	}




}

?>