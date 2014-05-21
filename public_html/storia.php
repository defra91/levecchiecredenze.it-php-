<?php
	require_once("../resources/library/utils/PageCompositor.php");
	$compositor = new PageCompositor();

	print $compositor->createPageHeader(2);
?>
<body>

	<div id="navigation">
		<?php
			print $compositor->createNavigationMenu(2);	
			print $compositor->createFooter(1);
		?>
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

	<?php
		print $compositor->createSocialTab();
	?>

</body>

</html>

<?php
	$compositor->registerPageLog(2);
?>