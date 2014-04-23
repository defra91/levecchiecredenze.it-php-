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

?>