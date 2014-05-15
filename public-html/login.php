<?php

	require_once("../php/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(11);

?>


<body>
	<div id="navigation">

		<?php

			print $compositor->createNavigationMenu(0);
			print $compositor->createFooter(3);

		?>

	</div>
	
	<div id="content">
		<h1>Area riservata</h1>
		<p>
			Attenzione! Stai per entrare nella sezione privata di amministrazione. Prima di poter entrare devi effettuare l'accesso. Inserisci il tuo <span lang="en">username</span> e la tua <span lang="en">password</span> nel <span lang="en">form</span> sottostante.
		</p>
		<form method="post" id="form" action="login.cgi">
			<fieldset>
				<legend>I tuoi dati</legend>
				<label lang="en" for="email">Username</label>
				<input type="text" name="email" class="text_input" id="email"/>
				<label lang="en" for="password">Password</label>
				<input type="password" name="password" class="text_input" id="password"/>
				<input type="submit" lang="en" value="Login" class="submit_input" />
			</fieldset>
		</form>
		<span id="loginError"><tmpl_var name="logged"></span>
	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	addVisitor();
?>