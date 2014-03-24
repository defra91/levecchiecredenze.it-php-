var ctrl = function() {
	$("#costo").keydown(function(event) {
		// permetti delete
		if ( event.keyCode == 46 || event.keyCode == 8 ) {
			$(".errore").remove();
		}
		else {
			if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault();
				var errore = $("<span class='errore'>Stai inserendo lettere...</span>");
				$(".errore").remove();
				$(this).after(errore);
				setTimeout(function() {
					$(".errore").remove();
				}, 1500);
			}
			else{
				$(".errore").remove();
			}
		}
	});
	$("input:text").keydown(function(event) {
      $(this).removeClass("highlight");
  });
	$("textarea").keydown(function(event) {
      $(this).removeClass("highlight");
  });
	setColumns();
};

var setColumns = function() {
	var height = Math.max($("#header").height(), $("#content").height());
	var h1 = $("#header").height();
	var h2 = $("#content").height();
	var finalHeight = (h1 > h2) ? h1 : h2;
	$("#header").height(finalHeight);
	$("#content").height(finalHeight);
}

$(document).ready(function () {
	ctrl();

	$("#form").submit(function(){
	var isFormValid = true;
    $("#form input:text").each(function(){
            if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
            isFormValid = false;
        } else {
            $(this).removeClass("highlight");
        }
    });
    $("#form textarea").each(function(){
        if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
            isFormValid = false;
        } else {
            $(this).removeClass("highlight");
        }
    });
    if (!isFormValid)
return false;
	});

});	

