<?php
include_once("Configuration.php");

	/**
	* This class is provided to describe and manage errors occured during methods execution
	*
	*/
	class Error extends Exception {
		/**
		* This method is the class constructor. It accepts three parameters corrisponding to class data field
		*/
		public function __construct($code, $title, $description) {
			$this->code = $code;
			$this->title = $title;
			$this->description = $description;

		}

		/**
		* This is a getter method that returns code data field of the class
		*/
		public function getErrorCode() {
			return $this->code;
		}

		/**
		* This is a getter method that returns title data field of the class
		*/
		public function getErrorTitle() {
			return $this->title;
		}

		/**
		* This is a getter method that returns description data field of the class
		*/
		public function getErrorDescription() {
			return $this->description;
		}

		/**
		* This is a setter method that sets code data field of the class
		*/
		public function setErrorCode($value) {
			$this->code = $value;
		}

		/**
		* This is a setter method that sets title data field of the class
		*/
		public function setErrorTitle($value) {
			$this->title = $value;
		}

		/**
		* This is a setter method that returns description data field of the class
		*/
		public function setErrorDescription($value) {
			$this->description = $value;
		}

		/**
		* This method returns the Error written in Html format compatible with site css
		*/
		public function printHtmlError() {
			$html .= "<h1 class=\"error\">" . "Error " . $this->code . ": " . $this->title . "</h1>";
			$html .= "<p class=\"error\">" . $this->description . "</p>";
			return $html;
		}

		/**
		* This method returns the error as an hash array
		*/
		private function toHash() {
			$hash = array("errorCode" => $this->code, "errorTitle" => $this->title, "errorDescription" => $this->description);
			return $hash;
		}

		/**
		* This method stores data fields into session variable and redirect to the default page error
		*/
		public function showErrorPage() {
			session_start();

			$_SESSION['error'] = $this->toHash();

			header("Location: ../view/error.php");

		}

		/**
		* This method use the php-github-api library in order to open an issue on github repository
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
