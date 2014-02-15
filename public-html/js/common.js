$(document).ready(
	
	function() {
	
	var height = Math.max($("#header").height(), $("#content").height());
	$("#header").height(height);
	$("#content").height(height);
 
 	i = 1;
	setInterval(function(){
		$('body').css({backgroundImage : 'url(' + images[i] + ')'});
		i++;
		if (i == images.length) i = 0;
	}, 5000);
});

var images = ['images/slideshow/1.jpg', 'images/slideshow/2.jpg', 'images/slideshow/3.jpg', 'images/slideshow/4.jpg', 'images/slideshow/5.jpg'];
