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
				if (empty($images)) {
					print "<p>Al momento la galleria non contiene immagini</p>";
				}
				else {
					for ($i=0; $i<count($images); $i++) {
						print 
						"<div class=\"image_container\">
							<a data-lightbox=\"roadtrip\" href=\"" . $images[$i]['percorso_immagine'] . "full/" . $images[$i]['nome_immagine'] . "\">
								<img class=\"gallery_item\" alt=\"" . $images[$i]['alt'] . "\" title=\"" . $images[$i]['title'] . "\" src=\"" . $images[$i]['percorso_immagine'] . "thumbs/" . $images[$i]['nome_immagine'] . "\" />
							</a>
						</div>"; 
					}
				}
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