<?php

	include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/utils/PageCompositor.php");

	$compositor = new PageCompositor();

	try {
		print $compositor->createPageHeader(13);
	}
	catch (Error $e) {
		$e->reportOnGithub(array("bug", "subscribe.php"));
		$e->showErrorPage();
	}

?>


<body>
	<div id="navigation">

		<?php

			print $compositor->createNavigationMenu(7);
			print $compositor->createFooter(1);

		?>

	</div>
	
	<div id="content">
		<h1>Iscriviti alla nostra newsletter</h1>
		<h2>Sarai costantemente informato di tutte le notizie principali relative al nostro ristorante.</h2>
		<hr/>

		<p>Compila il form sottostante inserendo i tuoi dati:</p>
		<form method="post" action="">
			<fieldset>
				<legend>I tuoi dati</legend>
				<label for="nome">Nome</label>
				<input name="name" id="nome" class="text_input" />
				<label for="cognome">Cognome</label>
				<input name="surname" id="cognome" class="text_input" />
				<label for="testo">Indirizzo email *</label>
				<input type="text" name="email" id="email" class="text_input" />
				<input type="submit" value="Invia" name="Invia" class="submit_input" />
				<input class="submit_input" type="reset" value="Reset" />
				</fieldset>
		</form>

		<span class="note">* campo obbligatorio</span>

		<h2 id="wait_message">Attendi. Stiamo inoltrando la tua richiesta...</h2>
		<!-- <img class="wait" src="images/dish.png" alt="una ruota che gira"/> -->
		<h3 class="error">L'indirizzo email da te inserito è già presente nella nostra newsletter.</h3>
		<h3 class="success">Complimenti! La registrazione è avvenuta correttamente.</h3>
		<p>Ti invitiamo a inserire un nuovo indirizzo email oppure contattare un'amministratore. Per fare questo puoi rivolgerti alla pagina <a href="help.php">help</a></p>
	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	$compositor->registerPageLog(7);
?>