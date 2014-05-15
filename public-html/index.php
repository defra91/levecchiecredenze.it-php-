<?php
	require_once("../php/PageCompositor.php");
	$compositor = new PageCompositor();

	print $compositor->createPageHeader(1);
?>

<body>
	<div id="navigation">
		<?php
			print $compositor->createNavigationMenu(1);	
			print $compositor->createFooter(1);
		?>

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
<?php
	print $compositor->createSocialTab();
?>

</body>

</html>

<?php
	include_once("../php/library.php");
	addVisitor();
?>
