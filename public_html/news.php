<?php

	include_once("../resources/library/utils/PageCompositor.php");

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
		<h1>Le nostre news</h1>
		<hr/>
		<ul id="news_list">
		<?php
		include_once($_SERVER['DOCUMENT_ROOT'] . "resources/library/controller/NewsController.php");

		$news = NewsController::getAllNews();

		for ($i=0; $i<count($news); $i++) {
			print "<li>";
			print "<span class=\"news_date\">" . substr($news[$i]['data'], 0, 10) . "</span>";
			print "<h2>" . $news[$i]['titolo'] . "</h2>";
			print "<p>" . $news[$i]['testo'] . "</p>";
			print "</li>";
		}

		?>
		</ul>

		<a href="#" id="news_subscribe">Iscriviti alla nostra newsletter</a>

	</div>

	<?php

		print $compositor->createSocialTab();

	?>

</body>

</html>

<?php
	$compositor->registerPageLog(7);
?>