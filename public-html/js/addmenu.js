//controllo inserimento valori
var ctrl = function() {
	$(".elementPrice").keydown(function(event) {
		// permetti delete
		if ( event.keyCode == 46 || event.keyCode == 8 ) {
		}
		else {
			if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault();
				//alert("Inserire solo numeri");
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
		var input1 = $("<label>Nome piatto</label><input type=\"text\" name=\"antipasto\" />");
		var input2=$("<label>Costo piatto</label><input type=\"text\" class=\"elementPrice\" name=\"costo_antipasto\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(input2);
		  openp.append(removeButton);
		$("#antipasti").append(openp);
		ctrl();
	});

	$('#add_primo').click(function(){
		var openp=$("<p>");
		var input1 = $("<label>Nome piatto</label><input type=\"text\" name=\"primo\"  />");
		var input2=$("<label>Costo piatto</label><input type=\"text\" class=\"elementPrice\" name=\"costo_primo\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(input2);
		  openp.append(removeButton);
		$("#primi").append(openp);
		ctrl();
	});

	$('#add_secondo').click(function(){
		var openp=$("<p>");
		var input1 = $("<label>Nome piatto</label><input type=\"text\" name=\"secondo\" />");
		var input2=$("<label>Costo piatto</label><input type=\"text\" class=\"elementPrice\" name=\"costo_secondo\"  />");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(input2);
		  openp.append(removeButton);
		$("#secondi").append(openp);
		ctrl();
	});

	$('#add_dessert').click(function(){
		var openp=$("<p>");
		var input1 = $("<label>Nome piatto</label><input type=\"text\" name=\"dessert\" />");
		var input2=$("<label>Costo piatto</label><input type=\"text\" class=\"elementPrice\" name=\"costo_dessert\"/>");
		var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" /></p>");
		  removeButton.click(function() {
            $(this).parent().remove();
        	});
		  openp.append(input1);
		  openp.append(input2);
		  openp.append(removeButton);
		$("#dessert").append(openp);
		ctrl();
	});


});	

