var ctrl = function() {
	$("#costo").keydown(function(event) {
		// permetti delete
		if ( event.keyCode == 46 || event.keyCode == 8 ) {
			$("#errore").remove();
		}
		else {
			if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault();
				var errore = $("<span id='errore' >Stai inserendo lettere...</span>");
				$("#errore").remove();
				$(this).parent().append(errore);
				setTimeout(function() {
					$("#errore").remove();
				}, 1500);
			}
			else{
				$("#errore").remove();
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
	$('#add_antipasto').click(function(){
		var openp=$("<p>");
		var nantipasti=$( "#antipasti label" ).length/2;
		var input1 = $("<label for\"antipasto"+nantipasti+"\">Nome piatto</label><input type=\"text\" name=\"antipasto\" id=\"antipasto"+nantipasti+"\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"rimuovi portata\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#antipasti").append(openp);
		ctrl();
	});

	$('#add_primo').click(function(){
		var openp=$("<p>");
		var nprimi=$( "#primi label" ).length/2;
		var input1 = $("<label>Nome piatto</label><input type=\"text\" name=\"primo\"id=\"primo"+nprimi+"\"  />");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"rimuovi portata\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#primi").append(openp);
		ctrl();
	});

	$('#add_secondo').click(function(){
		var openp=$("<p>");
		var nsecondi=$( "#secondi label" ).length/2;
		var input1 = $("<label for=\"secondo"+nsecondi+"\">Nome piatto</label><input type=\"text\" name=\"secondo\" id=\"secondo"+nsecondi+"\"  />");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"rimuovi portata\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#secondi").append(openp);
		ctrl();
	});

	$('#add_dessert').click(function(){
		var openp=$("<p>");
		var ndessert=$( "#dessert label" ).length/2;
		var input1 = $("<label for=\"dessert"+ndessert+"\">Nome piatto</label><input type=\"text\" name=\"dessert\"id=\"dessert"+ndessert+"\" />");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"rimuovi portata\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#dessert").append(openp);
		ctrl();
	});
	$("#form").submit(function(){
	var isFormValid = true;
    $("#form input:text").each(function(){ // Note the :text
        if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
            isFormValid = false;
        } else {
            $(this).removeClass("highlight");
        }
    });
    if (!isFormValid)
    	event.preventDefault();
    return isFormValid;
	
	});

});	

