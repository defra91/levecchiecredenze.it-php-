<?php

/**
* Describes and manage errors occured during methods execution
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*
*/
class Error {
	/**
	* Public class constructor
	* @param integer $code error code
	* @param string $title error title
	* @param string $description error description
	* @access public
	*/
	public function __construct($code, $title, $description) {
		$this->code = $code;
		$this->title = $title;
		$this->description = $description;

	}

	/**
	* Getter method that returns code data field of the class
	* @return integer error code
	* @access public
	*/
	public function getCode() {
		return $this->code;
	}

	/**
	* Getter method that returns title data field of the class
	* @return string error title
	* @access public
	*/
	public function getTitle() {
		return $this->title;
	}

	/**
	* Getter method that returns description data field of the class
	* @return string error description
	* @access public
	*/
	public function getDescription() {
		return $this->description;
	}

	/**
	* Setter method that sets code data field of the class
	* @param integer $value error code
	* @access public
	*/
	public function setCode($value) {
		$this->code = $value;
	}

	/**
	* This is a setter method that sets title data field of the class
	* @param string $value error title
	* @access public
	*/
	public function setTitle($value) {
		$this->title = $value;
	}

	/**
	* Setter method that returns description data field of the class
	* @param string $value error description
	* @access public
	*/
	public function setDescription($value) {
		$this->description = $value;
	}

	/**
	* Returns the Error written in Html format compatible with site css
	* @return string the html code of the error
	* @access public
	*/
	public function printHtmlError() {
		$html .= "<h1 class=\"error\">" . "Error " . $this->code . ": " . $this->title . "</h1>";
		$html .= "<p class=\"error\">" . $this->description . "</p>";
		return $html;
	}

	/**
	* Returns the error as an hash array
	* @return hash the error as a hash
	* @access public
	*/
	public function toHash() {
		$hash = array("errorCode" => $this->code, "errorTitle" => $this->title, "errorDescription" => $this->description);
		return $hash;
	}

	/**
	* Stores data fields into session variable and redirect to the default page error
	* @access public
	*/
	public function showErrorPage() {
		session_start();

		$_SESSION['error'] = $this->toHash();

		header("Location: ../public-html/error.php");

	}

	/**
	* Use the php-github-api library and open an issue on github repository
	* @access public
	*/
	public function reportOnGithub($labels) {
		$config = Configuration::getProjectConfiguration();
		if (!isset($labels)) {
			$labels = array();
		}
		require_once '../vendor/autoload.php';
		try {
			$client = new \Github\Client();
			$client->authenticate($config['githubUsername'], $config['githubPassword'], Github\Client::AUTH_HTTP_PASSWORD);
			$issue = $client->api('issue')->create($config['githubUsername'], $config['githubRepositoryName'], 
				array('title' => "Error " . $this->getErrorCode() . ": " . $this->getErrorTitle(), 'body' => $this->getErrorDescription(), 'labels' => $labels));
		}
		catch(Exception $e) {
			print $e->getMessage();
			print $e->getCode();
		}
	}
}

?>
