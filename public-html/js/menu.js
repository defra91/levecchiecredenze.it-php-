window.onload = function() {
		listino = new Array();
		//document.getElementById('menu_antipasti').className = "box";
		listino.push(document.getElementById('menu_antipasti'));
		listino.push(document.getElementById('menu_primi'));
		listino.push(document.getElementById('menu_secondi'));
		listino.push(document.getElementById('menu_dessert'));
		for(i=0; i<listino.length; i++){
			listino[i].className = "box";
		}
	};
$(document).ready(function () {
  $("#antipasti").click(function(){ 
	if( $("#menu_antipasti").hasClass("box")){
		$("#menu_antipasti").removeClass("box");
	}
	else{
		$("#menu_antipasti").addClass("box");
		
	} });
 $("#primi").click(function(){ 
	if( $("#menu_primi").hasClass("box")){
		$("#menu_primi").removeClass("box");
	}
	else{
		$("#menu_primi").addClass("box");
		
	} });
 $("#secondi").click(function(){ 
	if( $("#menu_secondi").hasClass("box")){
		$("#menu_secondi").removeClass("box");
	}
	else{
		$("#menu_secondi").addClass("box");
		
	} });
 $("#dessert").click(function(){ 
	if( $("#menu_dessert").hasClass("box")){
		$("#menu_dessert").removeClass("box");
	}
	else{
		$("#menu_dessert").addClass("box");
		
	} });
});



