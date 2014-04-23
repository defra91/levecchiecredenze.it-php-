<?php
	include_once("../mysql/operations.php");
	// Questo file contiene tutta una serie di funzioni utilizzate all'interno del sito

	function verifyVisitor() {
		session_start();
		if (!isset($_SESSION['visitor'])) {
			$_SESSION['visitor'] = "visitor";
			return true;
		}
		else {
			return false;
		}
	}

	function addVisitor() {
		if (verifyVisitor()) {
			$ip = $_SERVER['REMOTE_ADDR'];
			$browser = getBrowser();
			increaseCounter($ip, $browser);
		}
	}

	function getBrowser()
	{
		$userAgent = $_SERVER['HTTP_USER_AGENT'];

		$chrome = strpos($userAgent, 'Chrome') ? true : false; // Google Chrome
		$firefox = strpos($userAgent, 'Firefox') ? true : false;	// Firefox
		$msie = strpos($userAgent, 'MSIE') ? true : false; // IE
		$safari = strpos($userAgent, 'Safari') ? true : false; // Safari

		if ($chrome) return "Google Chrome";
		elseif ($firefox) return "Mozilla Firefox";
		elseif ($msie)	return "Internet Explorer";
		elseif ($safari) return "Safari";
		else return "Unknown";
	}

	function loadGallery() {
		extractImages();
	}


?>