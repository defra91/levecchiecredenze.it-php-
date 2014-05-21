<?php

	require_once("../resources/library/utils/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(9);

?>

<body>
	<div id="navigation">

		<?php

			print $compositor->createNavigationMenu(9);
			print $compositor->createFooter(1);

		?>

	</div>
	
	<div id="content">
		<h1>Contattaci</h1>
		<hr/>
		<p>Compila il <span lang="en">form</span> sottostante per inviarci un messaggio di posta elettronica. Ti risponderemo appena possibile:</p>
		
		<form method="post" action="">
			<fieldset>
				<legend>I tuoi dati</legend>
				<label for="nome">Nome</label>
				<input name="name" id="nome" class="text_input" />
				<label for="cognome">Cognome</label>
				<input name="surname" id="cognome" class="text_input" />
				<label for="reason">Motivo del contatto</label>
				<select name="reason" id="reason">
					<option value="info">Informazioni generali</option>
					<option value="prenotazione">Prenotazione</option>
					<option value="curriculum">Domanda di lavoro</option>
					<option value="other">Altro</option>
				</select>
				<label for="testo">Testo</label>
				<textarea name="text" id="testo" rows="10" cols="60" ></textarea>
				<input type="submit" value="Invia" name="Invia" class="submit_input" />
				</fieldset>
		</form>

		<p>Oppure vieni a trovarci nei nostri <span lang="en">social network</span>:</p>

		<ul id="social_list">
			<li><a href="#" lang="en">Facebook</a></li>
			<li><a href="#" lang="en">Twitter</a></li>
			<li><a href="#" lang="en">Google Plus</a></li>
			<li><a href="#" lang="en">Tripadvisor</a></li>
		</ul>

	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	$compositor->registerPageLog(9);
?>