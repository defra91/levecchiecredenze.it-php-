<?php

	require_once("../php/PageCompositor.php");

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
			<?php
				include_once("../php/library.php");
				loadNews();
			?>
		</ul>
	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	addVisitor();
?>