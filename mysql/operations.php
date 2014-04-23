<?php
	function increaseCounter($ip, $browser) {
		require_once("config.php");
		$query = "insert into contatore_visite value(null, \"$ip\", \"$browser\", now());";
		mysql_query($query, $connessione) or die("Errore! Impossibile connettersi al database.");
	}

	function extractImages() {
		require_once("config.php");
		$query = "select * from immagini where categoria_immagine = \"fotogallery\"";
		$dbResult = mysql_query($query, $connessione);
		$rows = mysql_affected_rows($connessione);
		for ($i=0; $i<$rows; $i++) {
			$image = mysql_fetch_row($dbResult);
			$src = "$image[2]/$image[1]";
			$alt = $image[7];
			$title = $image[8];

			print 
				"<div class=\"image_container\">
					<a href=\"$src\" data-title=\"$title\" data-lightbox=\"roadtrip\">
						<img class=\"gallery_item\" alt=\"$alt\" title=\"$title\" src=\"$src\" />
					</a>
				</div>";
		}
	}

	function extractNews() {
		require_once("config.php");
		$query = "select day(data), month(data), year(data), titolo, testo from news where lingua = 'ita' order by data desc;";
		$dbResult = mysql_query($query, $connessione);
		$affectedRows = mysql_affected_rows($connessione);
		for ($i=0; $i<$affectedRows; $i++) {
			$news = mysql_fetch_row($dbResult);
			$month = monthToString($news[1]);
			print 
				"<li>
					<span>
						$news[0] $month $news[2]
					</span>
					<h2>
						$news[3]
					</h2>
					<p>
						$news[4]
					</p>
				</li>
			";
		}
	}

	function monthToString($n) {
		$month = "";
		switch ($n) {
			case 1:
				$month = "Gennaio";
				break;
			case 2:
				$month = "Febbraio";
				break;
			case 3:
				$month = "Marzo";
				break;
			case 4:
				$month = "Aprile";
				break;	
			case 5:
				$month = "Maggio";
				break;
			case 6:
				$month = "Giugno";
				break;
			case 7:
				$month = "Luglio";
				break;
			case 8:
				$month = "Agosto";
				break;
			case 9:
				$month = "Settembre";
				break;	
			case 10:
				$month = "Ottobre";
				break;
			case 11:
				$month = "Novembre";
				break;
			case 12:
				$month = "Dicembre";
				break;
			default:
				$month = "undefined";
				break;
		}
		return $month;
	}

?>