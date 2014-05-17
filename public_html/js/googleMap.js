function initialize() {
	var fenway = new google.maps.LatLng(44.93956, 7.78015);
	var mapOptions = {
		center: fenway,
		zoom: 17
	};
	var map = new google.maps.Map(
	document.getElementById('google_map_canvas'), mapOptions);
	
}

google.maps.event.addDomListener(window, 'load', initialize);