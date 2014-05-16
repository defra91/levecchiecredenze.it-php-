<?php

	/**
	* This class is provided to describe and manage errors occured during methods execution
	*
	*/
	class Error {
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
		public function getCode() {
			return $this->code;
		}

		/**
		* This is a getter method that returns title data field of the class
		*/
		public function getTitle() {
			return $this->title;
		}

		/**
		* This is a getter method that returns description data field of the class
		*/
		public function getDescription() {
			return $this->description;
		}

		/**
		* This is a setter method that sets code data field of the class
		*/
		public function setCode($value) {
			$this->code = $value;
		}

		/**
		* This is a setter method that sets title data field of the class
		*/
		public function setTitle($value) {
			$this->title = $value;
		}

		/**
		* This is a setter method that returns description data field of the class
		*/
		public function setDescription($value) {
			$this->description = $value;
		}

		/*
		* This method returns the Error written in Html format compatible with site css
		*/
		public function printHtmlError() {
			$html .= "<h1 class=\"error\">" . "Error " . $this->code . ": " . $this->title . "</h1>";
			$html .= "<p class=\"error\">" . $this->description . "</p>";
			return $html;
		}

		/*
		* This method returns the error as an hash array
		*/
		private function toHash() {
			$hash = array("errorCode" => $this->code, "errorTitle" => $this->title, "errorDescription" => $this->description);
			return $hash;
		}

		/*
		* This method stores data fields into session variable and redirect to the default page error
		*/
		public function showErrorPage() {
			session_start();

			$_SESSION['error'] = $this->toHash();

			header("Location: ../public-html/error.php");

		}



	}

?>
