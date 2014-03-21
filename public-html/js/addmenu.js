$(document).ready(function() {
	$('#add_antipasto').click(function(){
		var openp=$("<p>");
		var num_antipasti=($("#antipasti p").length+1)/2;
		var input = $("<input type=\"text\" name=\"antipasto"+num_antipasti+"\" placeholder=\"Nome antipasto\" /> <input type=\"text\" name=\"costo"+num_antipasti +"\" placeholder=\"Costo antipasto\" />");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input);
		  openp.append(removeButton);
		$("#antipasti").append(openp);
	});
});