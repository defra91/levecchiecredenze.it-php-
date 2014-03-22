$(document).ready(function () {

	$('#add_antipasto').click(function(){
		var openp=$("<p>");
		var nantipasti=$( "#antipasti label" ).length/2;
		var input1 = $("<label for\"antipasto"+nantipasti+"\">Nome piatto</label><input type=\"text\" name=\"antipasto\" id=\"antipasto"+nantipasti+"\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
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
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
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
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
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
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(removeButton);
		$("#dessert").append(openp);
		ctrl();
	});


});	

