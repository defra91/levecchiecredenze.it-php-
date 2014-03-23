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
				$(this).parent().append(errore);
				setTimeout(function() {
					$(".errore").remove();
				}, 1500);
			}
			else{
				$(".errore").remove();
			}
		}
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
	$('#add_portata').click(function(){
		var openp=$("<p>");
		var nportate=$( "#portate label" ).length;
		var input1 = $("<label for=\"portata"+nportate+"\">Nome portata</label><input type=\"text\" name=\"portata\" id=\"portata"+nportate+"\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"rimuovi portata\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#portate").append(openp);
		ctrl();
	});

	$("#form").submit(function(){
	var isFormValid = true;
    $("#form input:text").each(function(){
    	var vuoto = $("<span class='vuoto'>Campo vuoto</span>");
        if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
           //$(this).parent().append(vuoto);
            isFormValid = false;
        } else {
            $(this).removeClass("highlight");
           // $(".vuoto").remove();
        }
    });
    if (!isFormValid)
    	event.preventDefault();
    return isFormValid;
	
	});

});	

