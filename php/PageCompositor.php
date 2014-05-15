<?php

/**
* This class is responsible to provide methods to load common section in Html pages
*/
class PageCompositor
{
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
	* 11 - admin.php
	*/

	/**
	* This is the constructor of the class
	*/
	function __construct() {}

	/**
	* This method provides to create the html header for each page
	**/
	$title;
	// create title array TODO

	$html .= "<title>" . $title . "</title>
	<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />
	<link rel=\"icon" href=\"images/favicon.ico\" type=\"image/x-icon\"/>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/print.css\" media=\"print\" /> 
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/screen.css\" media=\"screen and (min-width: 1024px)\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/tablet-landscape.css\" media=\"only screen and (min-width: 480px) and (max-width: 1024px)\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/smartphone-portrait.css\" media=\"only screen and (max-width: 480px) and (orientation: portrait)\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/smartphone-landscape.css\" media=\"only screen and (max-width: 480px) and (orientation: landscape)\" />
	<script type=\"text/javascript" src="js/jquery.js\"></script>
	<script type=\"text/javascript\" src=\"js/common.js\"></script>";
	}

	/**
	* This method provides to create the navigation section for a page. It accepts the number id of a page. 
	*/
	function createNavigationMenu($pageId) {
		// first of all includes the upper banner, then starts an unordered list
		$html = "<img src=\"images/banner.png\" alt=\"Logo, composto dal nome del ristorante\"/>\n<ul>";

		// create array with label and url for each menu item
		$items = array("Home" => "index.php", "La storia" => "storia.php", "Il nostro menu" => "menu.php", "La nostra cantina" => "cantina.php", "Galleria" => "gallery.php", "I nostri eventi" => "eventi.php", "Le nostre news" => "news.php", "Come raggiungerci" => "raggiungerci.php", "Contattaci" => "contatti.php");
		
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
	* This method provides to create the footer section for a page. It accepts a parameter mode, which determine the way the result is returned
	*/
	function createFooter($mode) {
		// write html code for footer section
		$html = "<div id=\"footer\">
			<h1>Ristorante Le Vecchie Credenze</h1>
			<a href=\"https://www.google.it/maps/place/Via+Alberassa,+16/@44.93956,7.78015,17z/data=!4m2!3m1!1s0x478809135fc4a16b:0x289899b75783023e\" target=\"_blank\">Via Alberassa, 16 Santena <abbr title=\Torino\">(TO)</abbr></a>
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
				$html .= "<a href=\"credits.php\" lang=\"en\">Credits</a>\n<p lang=\"en\">Admin</a>";
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


}

?>