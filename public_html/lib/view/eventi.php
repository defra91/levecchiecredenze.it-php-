<?php

	require_once("../php/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(6);

?>

<body>

	<div id="navigation">
		<?php
			print $compositor->createNavigationMenu(6);	
			print $compositor->createFooter(1);
		?>
	</div>
	<div id="content">

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