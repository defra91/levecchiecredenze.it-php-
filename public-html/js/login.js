$(document).ready(function() {
	$("#form").submit(function(){ 
		var isFormValid = true;
	$("#form input").each(function(){ 
		if($.trim($(this).val()).length == 0){ 
			$(this).addClass("highlight"); 
			isFormValid = false;
		} 
		else{ 
	    	$(this).removeClass("highlight");
		}
	    });
	    if (!isFormValid) {
	    	return false;
	    }
	});
	$("input").keydown(function(event) {
		$(this).removeClass("highlight");
  	});
});