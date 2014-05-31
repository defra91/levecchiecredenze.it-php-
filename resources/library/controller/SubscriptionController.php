<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/Error.php")


/**
* Privides controller function for subscriptions
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class SubscriptionController {
	
	/**
	* Public class constructor
	* @access public
	*/
	public function __construct() {}

	/**
	* Add subscriber in the database
	* @param Subscriber subscriber object
	*/
	public function addSubscriber($subscriber) {
		$model = new SubscriptionModel();
		try {
			if ($model->verifyEmailExistence($subscriber->getEmail())) {
				// email already exixtent
			}
			else {
				$model->insertSubscription($subscriber);
			}
		}
		catch(Error $e) {
		}
	}
}

/**
* Provides description for subscription data
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class Subscription {
	
	/**
	* Public class constructor
	* @param String $name subscriber name
	* @param String $surname subscriber surname
	* @param String $email subscriber email address
	* @access public
	*/
	public function __construct($name, $surname, $email) {
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
	}

	/**
	* Returns subscriber's name
	* @return String subscriber's name
	* @access public
	*/
	public function getName() {
		return $this->name;
	}

	/**
	* Returns subscriber's surname
	* @return String subscriber's surname
	* @access public
	*/
	public function getSurname() {
		return $this->surname;
	}

	/**
	* Returns subscriber's email
	* @return String subscriber's email
	* @access public
	*/
	public function getEmail() {
		return $this->email;
	}

	/**
	* Sets subscriber's name
	* @param String $name subscriber's name
	* @access public
	*/
	public function setName($name) {	
		$this->name = $name;
	}

	/**
	* Sets subscriber's surname
	* @param String $surname subscriber's surname
	* @access public
	*/
	public function setSurname($surname) {
		$this->surname = $surname;
	}

	/**
	* Sets subscriber's email address
	* @param String $email subscriber's email address
	* @access public
	*/
	public function setEmail($email) {
		$this->email = $email;
	}
}

?>