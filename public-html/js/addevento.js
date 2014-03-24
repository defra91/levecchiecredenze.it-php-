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
	var h1 = $("#navigation").height();
	var h2 = $("#content").height();
	var finalHeight =0;
	if(h1>h2)
		finalHeight=h1;
	else
		finalHeight=h2;
	$("#navigation").height(finalHeight);
	$("#content").height(finalHeight);
};

$(document).ready(function () {
	ctrl();
	setColumns();
	$('#add_portata').click(function(){
		var openp=$("<p>");
		var nportate=$( "#portate label" ).length;
		var input1 = $("<label for=\"portata"+nportate+"\">Nome portata *</label><input type=\"text\" name=\"item\" id=\"portata"+nportate+"\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"rimuovi portata\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#portate").append(openp);
		ctrl();
		setColumns();
	});

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

