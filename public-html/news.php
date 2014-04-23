<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<title lang="en">News | levecchiecredenze.it</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen and (min-width: 1024px)" />
	<link rel="stylesheet" type="text/css" href="css/tablet-landscape.css" media="only screen and (min-width: 480px) and (max-width: 1024px)" /> 
	<link rel="stylesheet" type="text/css" href="css/smartphone-portrait.css" media="only screen and (max-width: 480px) and (orientation: portrait" />
	<link rel="stylesheet" type="text/css" href="css/smartphone-landscape.css" media="only screen and (max-width: 480px) and (orientation: landscape" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
</head>

<body>
	<div id="navigation">
		<img src="images/banner.png" alt="Logo composto dal nome del ristorante"/>

			<ul>
				<li class="menu_item" lang="en"><a href="index.php">Home</a></li>
				<li class="menu_item"><a href="storia.php">La storia</a></li>
				<li class="menu_item"><a href="menu.php">Il nostro menu</a></li>
				<li class="menu_item"><a href="cantina.php">La nostra cantina</a></li>
				<li class="menu_item"><a href="gallery.php">Galleria</a></li>
				<li class="menu_item"><a href="eventi.php">I nostri eventi</a></li>
				<li class="menu_item_selected">Le nostre news</li>
				<li class="menu_item"><a href="raggiungerci.php">Come raggiungerci</a></li>
				<li class="menu_item"><a href="contatti.php">Contattaci</a></li>
			</ul>

		<div id="footer">
			<h1>Ristorante Le Vecchie Credenze</h1>
			<p>Via Alberassa, 16 Santena <abbr title="Torino">(TO)</abbr></p>
			<p><abbr title="Telefono">Tel.</abbr> 011-9456455</p>
			<p><abbr title="Partita iva">P.IVA</abbr> 04781560489</p>
			<p>info@levecchiecredenze.it</p>
			<p>Chiuso il Lunedì</p>
			<p>Orario: 12:30 - 14:30, 19:00 - 00:00</p>
			<a href="credits.php" lang="en">Credits</a>
			<a href="login.php" lang="en">Admin</a> 
			<a href="http://validator.w3.org/check?uri=referer" lang="en"><img src="images/validator.png" alt="Validatore W3C" /></a>
		</div>

	</div>
	
	<div id="content">
		<h1>News</h1>
		<hr/>
		<ul id="news_list">
			<?php
				include_once("../php/library.php");
				loadNews();
			?>
		</ul>
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
	addVisitor();
?>