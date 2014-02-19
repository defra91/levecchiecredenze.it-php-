$(document).ready(
	
	function() {
	
	/* Imposto le due colonne con altezza uguale */

	setColumns();

	/* Imposto il comportamento per le voci di menu */

	$(".menu_item").mouseover(function() {
		$(this).children("a").css("color", "#ab8d77");
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

	/* cript per allargare o restringere il font */

	$("#increaseFont").click(function() {
		t1 = 0; t2 = 0;
		$("#content p").each(function() {
			t1 += $(this).height();
		});

		font = parseInt($("#content").children("p").css("font-size"));
		font = font + 2 + "px";
		$("#content").children("p").css("font-size", font);

		$("#content p").each(function() {
			t2 += $(this).height();
		});

		diff = t2 - t1;
		height = $("#content").height() + diff;
		$("#content").height(height);
		setColumns();
	});
	$("#decreaseFont").click(function() {
		t1 = 0; t2 = 0;
		$("#content p").each(function() {
			t1 += $(this).height();
		});

		font = parseInt($("#content").children("p").css("font-size"));
		font = font - 2 + "px";
		$("#content").children("p").css("font-size", font);

		$("#content p").each(function() {
			t2 += $(this).height();
		});

		diff = t1 - t2;
		height = $("#content").height() - diff;
		$("#content").height(height);
		setColumns();
	});
});


/* Array di immagini da visualizzare nella slideshow di sfondo */

var images = ['images/slideshow/1.jpg', 'images/slideshow/2.jpg', 'images/slideshow/3.jpg', 'images/slideshow/4.jpg', 'images/slideshow/5.jpg'];

/* funzione imposta a pari altezza le due colonne */

var setColumns = function() {
	var height = Math.max($("#header").height(), $("#content").height());
	var h1 = $("#header").height();
	var h2 = $("#content").height();
	var finalHeight = (h1 > h2) ? h1 : h2;
	$("#header").height(finalHeight);
	$("#content").height(finalHeight);
}


var fontStep = 0;	// un contatore per gestire il testo