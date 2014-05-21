<?php

	require_once("../resources/library/utils/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(8);

?>

<body>
	<div id="navigation">

		<?php

			print $compositor->createNavigationMenu(8);
			print $compositor->createFooter(1);

		?>

	</div>
	
	<div id="content">
		

		<h1>Ristorante</h1>
		<h2>Le Vecchie Credenze</h2>
		<h3>di Vittorio e Valeria</h3>
		<hr/>
		<p>Via Alberassa, 16 - Santena (TORINO) 10026</p>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/googleMap.js"></script>
		<div id="google_map_canvas"></div>
	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	$compositor->registerPageLog(8);
?>