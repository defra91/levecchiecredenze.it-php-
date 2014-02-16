$(document).ready(
	
	function() {
	
	/* Imposto le due colonne con altezza uguale */

	var height = Math.max($("#header").height(), $("#content").height());
	$("#header").height(height);
	$("#content").height(height);

	/* Imposto il comportamento per le voci di menu */

	$(".menu_item").mouseover(function() {
		$(this).children("a").css("color", "red");
		$(this).css("border-color", "#FFF");
	});

	$(".menu_item").mouseout(function() {
		$(this).children("a").css("color", "#FFF");
		$(this).css("border-color", "#555");
	});

	$(".menu_item").click(function() {
		url = $(this).children("a").attr("href");
		window.location = url;
	});
	
	/* Imposto la slideshow di sfondo */

 	i = 1;
	setInterval(function(){
		$('body').css({backgroundImage : 'url(' + images[i] + ')'});
		i++;
		if (i == images.length) i = 0;
	}, 5000);
});


/* Array di immagini da visualizzare nella slideshow di sfondo */

var images = ['images/slideshow/1.jpg', 'images/slideshow/2.jpg', 'images/slideshow/3.jpg', 'images/slideshow/4.jpg', 'images/slideshow/5.jpg'];
