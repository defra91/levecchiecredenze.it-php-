<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<title>Home page | levecchiecredenze.it</title>
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
		<img src="images/banner.png" alt="Logo, composto dal nome del ristorante"/>
			<ul>
				<li class="menu_item_selected" lang="en">Home</li>
				<li class="menu_item"><a href="storia.php">La storia</a></li>
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
			<p>Via Alberassa, 16 Santena <abbr title="Torino">(TO)</abbr></p>
			<p><abbr title="Telefono">Tel.</abbr> 011-9456455</p>
			<p><abbr title="Partita iva">P.IVA</abbr> 04781560489</p>
			<p>info@levecchiecredenze.it</p>
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
		<h1>Ristorante</h1>
		<h2>Le Vecchie Credenze</h2>
		<h3>di Vittorio e Valeria</h3>
		<hr/>
		<p>
			“Le Vecchie Credenze” è situato in un'ala di un’antica cascina, dove l'abitato di Santena lascia spazio alla campagna circostante.
		</p>
		<p>
			Il ristorante è frutto di una ristrutturazione accurata, studiata per accogliere comodamente gli ospiti mantenendo la ruralità e il calore del contesto, sia nella sala interna che nell'ampio porticato. Tra dentro e fuori i coperti sono circa 130. 
		</p>
		<p>
			Un ampio parcheggio ed uno spazio esterno dedicato ai bambini sono disponibili all'interno della proprietà, completamente recintata. 
		</p>
		<p>
			Gli ospiti vengono accolti subito dal profumo del pane appena sfornato, come era consuetudine (un tempo) nelle case rurali. Nei mesi invernali la fiamma del caminetto rallegra i commensali, coinvolgendoli in un'atmosfera tranquilla e raffinata: quello che ci vuole per assaporare al meglio i piaceri della buona tavola.
		</p>
		<p>
			La prossimità all'uscita Santena della tangenziale Villanova–Torino consente al ristorante di essere facilmente raggiungibile e di essere una mèta ideale anche per veloci pranzi o cene di lavoro.
		</p>
		<p>
			È a disposizione, su richiesta, una saletta per pochi intimi nella cantina con voltini in mattoni a vista.
		</p>
		<p>
			La cucina è guidata dallo chef patron Vittorio Dalla Vecchia, che persegue un giusto equilibrio tra tradizione e innovazione, promozione dei prodotti del territorio e ricerca, in un ambiente piacevole e con un servizio particolarmente curato.
		</p>
		<p>
			I menù vengono studiati con grande professionalità: tutte le proposte tengono conto della stagionalità, del territorio, della qualità dei cibi e della ricchezza delle portate, con particolare attenzione all'abbinamento dei vini. E’ da evidenziare un grande apprezzamento e il più rigoroso rispetto per la produzione di allevatori e produttori che forniscono a Vittorio gli ingredienti per le sue ricette.
		</p>

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
	include_once("../php/library.php");
	addVisitor();
?>
