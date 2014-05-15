<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<title>La storia | levecchiecredenze.it</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print" /> 
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen and (min-width: 1024px)" />
	<link rel="stylesheet" type="text/css" href="css/tablet-landscape.css" media="only screen and (min-width: 480px) and (max-width: 1024px)" /> 
	<link rel="stylesheet" type="text/css" href="css/smartphone-portrait.css" media="only screen and (max-width: 480px) and (orientation: portrait)" />
	<link rel="stylesheet" type="text/css" href="css/smartphone-landscape.css" media="only screen and (max-width: 480px) and (orientation: landscape)" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
</head>

<body>
	<div id="navigation">
		<img src="images/banner.png" alt="Logo, composto dal nome, del ristorante"/>
			<ul>
				<li class="menu_item"><a href="index.php" lang="en">Home</a></li>
				<li class="menu_item_selected">La storia</li>
				<li class="menu_item"><a href="menu.php">Il nostro menu</a></li>
				<li class="menu_item"><a href="cantina.php">La nostra cantina</a></li>
				<li class="menu_item"><a href="gallery.php">Galleria</a></li>
				<li class="menu_item"><a href="eventi.php">I nostri eventi</a></li>
				<li class="menu_item"><a href="news.php">Le nostre news</a></li>
				<li class="menu_item"><a href="raggiungerci.php">Come raggiungerci</a></li>
				<li class="menu_item"><a href="contatti.php">Contattaci</a></li>
			</ul>

		<div id="footer">
			<h1>Ristorante Le Vecchie Credenze</h1>
			<a href="https://www.google.it/maps/place/Via+Alberassa,+16/@44.93956,7.78015,17z/data=!4m2!3m1!1s0x478809135fc4a16b:0x289899b75783023e" target="_blank">Via Alberassa, 16 Santena <abbr title="Torino">(TO)</abbr></a>
			<p><abbr title="Telefono">Tel.</abbr> 011-9456455</p>
			<p><abbr title="Partita iva">P.IVA</abbr> 04781560489</p>
			<a href="mailto:info@levecchiecredenze.it" target="_blank">info@levecchiecredenze.it</a>
			<p>Chiuso il Lunedì</p>
			<p>Orario: 12:30 - 14:30, 19:00 - 00:00</p>
			<a href="credits.php" lang="en">Credits</a>
			<a href="login.php" lang="en">Admin</a> 
			<a href="http://validator.w3.org/check?uri=referer" lang="en"><img src="images/validator.png" alt="Validatore W3C" /></a> 
			<a href="http://jigsaw.w3.org/css-validator/check/referer" lang="en">
        	<img src="images/validatorcss.gif" alt="Validatore W3C CSS3" /></a>
        	<a href="http://www.w3.org/WAI/WCAG2AAA-Conformance" lang="en">
        	<img src="images/wcag.gif" alt="Validato WCAG 2.0. AAA" /></a>
		</div>

	</div>
	
	<div id="content">
		
		<h1>La storia</h1>

		<p>
			Vittorio Dalla Vecchia, patron de “Le Vecchie Credenze”, è nato a Valdagno nel 1966 e ha frequentato l'I.P.C. a Recoaro Terme, vicino a Vicenza. L'istituto fa parte dell'Associazione Europea delle scuole alberghiere e del turismo, istituita nel 1963.
		</p>
		<p>
			Le origini del ristorante “Le Vecchie Credenze” sono particolari: Vittorio, dopo 10 anni di esperienze lavorative in alberghi italiani di prima categoria, giunge a Chieri. Qui trasforma un bar di vecchie tradizioni in un bel ristorante, dove inizialmente propone la sua cucina veneta. Poi rimane affascinato dalle ricette del territorio e, conquistato dai prodotti tipici piemontesi, inizia a promuovere esclusivamente le produzioni locali con un tocco di fantasia particolare tutto suo.
		</p>
		<p>
			Dopo 18 anni a Chieri, Vittorio apre “Le Vecchie Credenze” a Santena, un paesino di 10000 abitanti circa.
		</p>

		<img src="images/st/2.jpg" alt="Vittorio e Valeria, gestori del ristorante, davanti a una tavola apparecchiata" />

	</div>

	<div id="social_tab">
		<a href="#"><img src="images/facebook-icon.png" alt="logo di Facebook" title="aggiungici su facebook" /></a>
		<a href="#"><img src="images/twitter-icon.png" alt="logo di Twitter" title="seguici su twitter" /></a>
		<a href="#"><img src="images/gplus-icon.png" alt="logo di Google Plus" title="aggiungici su Google+" /></a>
		<a href="#"><img src="images/tripadvisor-icon.png" alt="logo di Tripadvisor" title="trovaci su Tripadvisor" /></a>
	</div>

</body>

</html>

<?php
	include("../php/library.php");
	addVisitor();
?>