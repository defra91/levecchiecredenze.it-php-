<?php

	require_once("../resources/library/utils/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(7);

?>


<body>
	<div id="navigation">

		<?php

			print $compositor->createNavigationMenu(7);
			print $compositor->createFooter(1);

		?>

	</div>
	
	<div id="content">
		<h1>News</h1>
		<hr/>
		<ul id="news_list">
		</ul>
	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	$compositor->registerPageLog(7);
?>