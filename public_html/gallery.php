<?php

	require_once("../resources/library/utils/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(5);

?>

<body>
	<div id="navigation">
		<?php
			print $compositor->createNavigationMenu(5);	
			print $compositor->createFooter(1);
		?>
	</div>
	
	<div id="content">
		<h1>Gallery</h1>
		<p>Di seguito viene riportata una galleria di immagini del nostro ristorante:</p>
		<hr/>
		<?php
			include_once("../resources/library/controller/ImageController.php");

			$images = ImageController::getAllImages();
			print $images;

		?>
	</div>

	<?php
		print $compositor->createSocialTab();
	?>

</body>

</html>

<?php
	$compositor->registerPageLog(5);
?>