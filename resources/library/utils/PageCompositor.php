<?php

include_once("Error.php");
/**
* This class is responsible to provide methods to load common section in Html pages
* @author Luca De Franceschi <luca.defranceschi.91@gmail.com>
*/
class PageCompositor {
	/**
	* The associations between pages and id is shown below:
	*
	* 1 - index.php
	* 2 - storia.php
	* 3 - menu.php
	* 4 - cantina.php
	* 5 - gallery.php
	* 6 - eventi.php
	* 7 - news.php
	* 8 - raggiungerci.php
	* 9 - contattaci.php
	* 10 - credits.php
	* 11 - login.php
	* 12 - error.php
	*/

	/**
	* Public class constructor
	* @access public
	*/
	public function __construct() {}

	/**
	* Creates the html header for each page
	* @param integer $pageId the id of the html page
	* @return string html source code for header
	* @access public
	**/
	public function createPageHeader($pageId) {
		// check if parameter has the right value
		if ($pageId > 12 || $pageId < 1 || !is_int($pageId)) {
			throw new Error(1000, "Invalid parameter", "The value you insereted on the call to the method 'createPageHeader' is wrong. It accepts an integer value between 1 and 11");
		}

		// create association between pages and title 
		$title = array(1 => "Home", 2 => "La storia", 3 => "Il nostro menu", 4 => "La nostra cantina", 5 => "Galleria", 6 => "I nostri eventi", 7 => "Le nostre news", 8 => "Come raggiungerci", 9 => "Conttattaci", 10 => "Credits", 11 => "Sezione di amministrazione", 12 => "Si è verificato un errore");
		
		// write header
		$html = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
		<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"it\" lang=\"it\">
		<head><title>" . $title[$pageId] . "</title>
		<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />
		<link rel=\"icon\" href=\"images/favicon.ico\" type=\"image/x-icon\"/>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/print.css\" media=\"print\" /> 
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/screen.css\" media=\"screen and (min-width: 1024px)\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/tablet-landscape.css\" media=\"only screen and (min-width: 480px) and (max-width: 1024px)\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/smartphone-portrait.css\" media=\"only screen and (max-width: 480px) and (orientation: portrait)\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/smartphone-landscape.css\" media=\"only screen and (max-width: 480px) and (orientation: landscape)\" />
		<script type=\"text/javascript\" src=\"js/jquery.js\"></script>
		<script type=\"text/javascript\" src=\"js/common.js\"></script>";

		if ($pageId == 5) {
			$html .= "<script type=\"text/javascript\" src=\"js/lightbox.js\"\></script>";
			$html .= "<link type=\"text/css\" href=\"css/lightbox.css\" rel=\"stylesheet\" />";
		}

		$html .= "</head>";
		return $html;
	}

	/**
	* Creates the navigation section for a page
	* @param integer $pageId the html page identification number
	* @return string html source code for navigation 
	* @access public 
	*/
	public function createNavigationMenu($pageId) {
		// first of all includes the upper banner, then starts an unordered list
		$html = "<img src=\"images/banner.png\" alt=\"Logo, composto dal nome del ristorante\"/>\n<ul>";

		// create array with label and url for each menu item
		$items = array("Home" => "home.php", "La storia" => "storia.php", "Il nostro menu" => "menu.php", "La nostra cantina" => "cantina.php", "Galleria" => "gallery.php", "I nostri eventi" => "eventi.php", "Le nostre news" => "news.php", "Come raggiungerci" => "raggiungerci.php", "Contattaci" => "contatti.php");		
		$html;
		$cnt = 1;
		foreach ($items as $key => $value) {
			$html .= "<li class=\"";
			if ($cnt == $pageId) {
				$html .= "menu_item_selected\"";
			}
			else {
				$html .= "menu_item\"";
			}
			if ($cnt == 1) {
				$html .= " lang=\"en\"";
			}
			$html .= ">";
			if ($cnt != $pageId) {
				$html .= "<a href=\"" . $value . "\">";
			}
			$html .= $key;
			if ($cnt != $pageId) {
				$html .= "</a>";
			}
			$html .= "</li>\n";

			$cnt++;
		}
		$html .= "</ul>";

		return $html;
	}

	/**
	* Register page access log
	* @param string $pageId page id
	* @access public
	*/
	public function registerPageLog($pageId) {
		$indexes = array(1 => "home.php", 2 => "storia.php", 3 => "menu.php", 4 => "cantina.php", 5 => "gallery.php", 6 => "eventi.php", 7 => "news.php", 8 => "raggiungerci.php", 9 => "contatti.php", 10 => "credits.php", 11 => "login.php", 12 => "error.php");
		include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/controller/LogController.php");
		$user = "";
		if (isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
		}
		else {
			$user = "Visitor";
		}
		$log = new LogController($user, $indexes[$pageId] . " requested and loaded", "pageAccess");
		$log->registerLog();
	}

	/**
	* Register access session has not been setted
	* @access public
	*/
	public function registerAccess() {
		include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/controller/AccessController.php");
		try {
			$access = new AccessController();
			$access->registerAccess();
		}
		catch (Exception $e) {
			// do something or nothing
		}
	}

	/**
	* Creates the footer section for a page
	* @param integer $mode the way footer must be presented
	* @return string html source code for footer section
	* @access public
	*/
	public function createFooter($mode) {
		// write html code for footer section
		$html = "<div id=\"footer\">
			<h1>Ristorante Le Vecchie Credenze</h1>
			<a href=\"https://www.google.it/maps/place/Via+Alberassa,+16/@44.93956,7.78015,17z/data=!4m2!3m1!1s0x478809135fc4a16b:0x289899b75783023e\" target=\"_blank\">Via Alberassa, 16 Santena <abbr title=\"Torino\">(TO)</abbr></a>
			<p><abbr title=\"Telefono\">Tel.</abbr> 011-9456455</p>
			<p><abbr title=\"Partita iva\">P.IVA</abbr> 04781560489</p>
			<a href=\"mailto:info@levecchiecredenze.it\" target=\"_blank\">info@levecchiecredenze.it</a>
			<p>Chiuso il Lunedì</p>
			<p>Orario: 12:30 - 14:30, 19:00 - 00:00</p>";

		// depending on the value of the variable the login and credits link are shown differently
		switch ($mode) {
			case 1:
				$html .= "<a href=\"credits.php\" lang=\"en\">Credits</a>\n<a href=\"login.php\" lang=\"en\">Admin</a>";
				break;
			case 2:
				$html .= "<p lang=\"en\">Credits</p>\n<a href=\"login.php\" lang=\"en\">Admin</a>";
				break;
			case 3:
				$html .= "<a href=\"credits.php\" lang=\"en\">Credits</a>\n<p lang=\"en\">Admin</p>";
				break;
			default:
				$html .= "<a href=\"credits.php\" lang=\"en\">Credits</a>\n<a href=\"login.php\" lang=\"en\">Admin</a>";
				break;
		}
		
		$html .= "<a href=\"http://validator.w3.org/check?uri=referer\" lang=\"en\"><img src=\"images/validator.png\" alt=\"Validatore W3C\" /></a> 
			<a href=\"http://jigsaw.w3.org/css-validator/check/referer\" lang=\"en\">
        	<img src=\"images/validatorcss.gif\" alt=\"Validatore W3C CSS3\" /></a>
        	<a href=\"http://www.w3.org/WAI/WCAG2AAA-Conformance\" lang=\"en\">
        	<img src=\"images/wcag.gif\" alt=\"Validatore WCAG 2.0. AAA\" /></a>
		</div>";

		// do some other operations on the string

		// return result
		return $html;
	}

	/**
	* Creates the social tab section of a page
	* @return string html source code of social tab section
	* @access public
	*/
	public function createSocialTab() {
		$html = "<div id=\"social_tab\">
		<a href=\"#\"><img src=\"images/facebook-icon.png\" alt=\"logo di Facebook\" title=\"aggiungici su facebook\" /></a>
		<a href=\"#\"><img src=\"images/twitter-icon.png\" alt=\"logo di Twitter\" title=\"seguici su twitter\" /></a>
		<a href=\"#\"><img src=\"images/gplus-icon.png\" alt=\"logo di Google Plus\" title=\"aggiungici su Google+\" /></a>
		<a href=\"#\"><img src=\"images/tripadvisor-icon.png\" alt=\"logo di Tripadvisor\" title=\"trovaci su Tripadvisor\" /></a>
	</div>";

		return $html;
	}

}

?>