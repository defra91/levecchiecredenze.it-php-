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
	if( $("#antipasti").hasClass("box")){
alert("ha box");
		$("#menu_antipasti").addClass("box");
	}
	else{
alert("non ha box");
		$("#menu_antipasti").removeClass("box");
	} });
 $("#primi").click(function(){ 
	$("#menu_primi").removeClass("box"); });
 $("#secondi").click(function(){ 
	$("#menu_secondi").removeClass("box"); });
 $("#dessert").click(function(){ 
	$("#menu_dessert").removeClass("box"); });
});



