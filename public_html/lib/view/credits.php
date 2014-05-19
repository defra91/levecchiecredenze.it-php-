<?php

	require_once("../controller/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(10);

?>

<body>
	<div id="navigation">

		<?php

			print $compositor->createNavigationMenu(0);
			print $compositor->createFooter(2);

		?>

	</div>
	
	<div id="content">

		<h1>Credits</h1>
		<h2>Gli autori del sito</h2>
		<hr/>
		<div class="author">
			<h1>Luca De Franceschi</h1>
			<img src="../../images/credits/luca.jpg" alt="foto dell'autore Luca De Franceschi" />
			<a href="mailto:luca.defranceschi.91@gmail.com" class="mail_author">luca.defranceschi.91@gmail.com</a>
			<a href="#" class="facebook_author">facebook/defra91</a>
			<a href="#" class="github_author">github/defra91</a>
		</div>

		<div class="author">
			<h1>Michele Dal Santo</h1>
			<img src="../../images/credits/michele.jpg" alt="foto dell'autore Michele Dal Santo" />
			<a href="mailto:dalsa91@gmail.com" class="mail_author">dalsa91@gmail.com</a>
			<a href="#" class="facebook_author">facebook/michele.dalsanto.5</a>
			<a href="#" class="github_author">github/fragiami</a>
		</div>

		<div class="author">
			<h1>Nicolò Tresoldi</h1>
			<img src="../../images/credits/nicolo.png" alt="foto dell'autore Niccolò Tresoldi" />
			<a href="mailto:nicolo.tresoldi@hotmail.it" class="mail_author">nicolo.tresoldi@hotmail.it</a>
			<a href="#" class="facebook_author">facebook/babbo.natale.56</a>
			<a href="#" class="github_author">github/Nico-92</a>
		</div>

		<div class="author">
			<h1>Davide Quaglio</h1>
			<img src="../../images/credits/davide.jpg" alt="foto dell'autore Davide Quaglio" />
			<a href="mailto:quaglio.davide@gmail.com" class="mail_author">quaglio.davide@gmail.com</a>
			<a href="#" class="facebook_author">facebook/Skyzzo92</a>
			<a href="#" class="github_author">github/Dquaglio</a>
		</div>

	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	$compositor->registerPageLog(10);
?>