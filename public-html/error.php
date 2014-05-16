<?php

	require_once("../php/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(12);

?>

<body>

	<div id="navigation">
		<?php
			print $compositor->createNavigationMenu(0);	
			print $compositor->createFooter(1);
		?>
	</div>
	<div id="content">

		<?php
			session_start();
			if (!isset($_SESSION['error'])) {
				header("Location: index.php");
			} 
			else {
				$error = $_SESSION['error'];
				$html = "<h1 class=\"error\">Si è verificato un errore</h1>";
				$html .= 
				"<ul>
				<li>Code: " . $error['errorCode'] . "</li>"
				. "<li>Titolo: " . $error['errorTitle'] . "</li>"
				. "<li>Descrizione: " . $error['errorDescription'] . "</li>"
				. "</ul>"
				. "<h2>Azioni disponibili:</h2><ul>"
				. "<li><a target=\"_blank\" href=\"https://github.com/defra91/levecchiecredenze.it/issues/new\">Crea una issue su github</a></li>"
				. "<li><a target=\"_blank\" href=\"mailto: luca.defranceschi.91@gmail.com\">Contatta lo sviluppatore</a></li>"
				. "<li>Go to the <a href=\"help.php\">help</a> page</li>"
				. "<li>Leggi la <a target=\"_blank\" href=\"https://github.com/defra91/levecchiecredenze.it/wiki\">documentazione di sviluppo</a></li>"
				. "</ul>";

				print $html; 

				unset($_SESSION['error']);
			}

		?>

	</div>

	<?php
		print $compositor->createSocialTab();
	?>

</body>

</html>

<?php
	include("../php/library.php");
	addVisitor();
?>