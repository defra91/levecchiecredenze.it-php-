<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "resources/Configuration.php");

/**
* This class is provided to describe and manage errors occured during methods execution
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class Error extends Exception {
	/*
	* Error code list:
	* 1000 - bad parameter
	* 2000 - mysql connection error
	* 2001 - mysql query execution error
	*/

	/**
	* Public class constructor
	* @param integer $code error code
	* @param string $title error title
	* @param string $description error information and 
	* @access public 
	*/
	public function __construct($code, $title, $description) {
		$this->code = $code;
		$this->title = $title;
		$this->description = $description;
	}

	/**
	* Returns code data field of the class
	* @return integer error code
	* @access public
	*/
	public function getErrorCode() {
		return $this->code;
	}

	/**
	* Returns title data field of the class
	* @return string error title
	* @access public
	*/
	public function getErrorTitle() {
		return $this->title;
	}

	/**
	* Returns description data field of the class
	* @return string error description
	* @access public
	*/
	public function getErrorDescription() {
		return $this->description;
	}

	/**
	* Sets code data field of the class
	* @param integer $value error code
	* @access public
	*/
	public function setErrorCode($value) {
		$this->code = $value;
	}

	/**
	* Sets title data field of the class
	* @param string $value error title
	* @access public
	*/
	public function setErrorTitle($value) {
		$this->title = $value;
	}

	/**
	* Sets description data field of the class
	* @param string $value error description
	* @access public
	*/
	public function setErrorDescription($value) {
		$this->description = $value;
	}

	/**
	* Prints error in html format compatible with site CSS
	* @access public
	*/
	public function printHtmlError() {
		$html = "<h1 class=\"error\">" . "Error " . $this->code . ": " . $this->title . "</h1>";
		$html .= "<p class=\"error\">" . $this->description . "</p>";
		print $html;
	}

	/**
	* Returns the error as an hash array
	* @return hash the error as an hash
	* @access private
	*/
	private function toHash() {
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

		header("Location: ../../../public_html/error.php");

	}

	/**
	* Uses the php-github-api library in order to open an issue on github repository
	* @param hash $labels set of labels for github issue
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
