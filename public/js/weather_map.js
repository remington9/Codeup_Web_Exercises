



$(function(){
 

 navigator.geolocation.getCurrentPosition(function(position){
    		//MAKES AJEX REQUEST FOR LAT AND LONG
			var ajaxReq = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&cnt=3", {
			    APPID: "c7b7c1d07f4ebe818d8577bb943809f6",
			    units: "imperial"
			});
			ajaxReq.always(function(){
				console.log('req sent');
			});
			ajaxReq.fail(function(data, error){
				console.log('error');
				console.log(ajaxReq.status);
			});
			ajaxReq.done(function(data){
				var cityName = data.city.name;
				weatherRender(data);
				displayMap(position.coords.latitude,position.coords.longitude,cityName);
				console.log('done');	
			});
});
// =================================================================
function displayMap(lat,lng,cityName){
	var latLng = new google.maps.LatLng(lat,lng);
	var mapOptions = {
		zoom: 15,
		center: latLng,
		animation: google.maps.Animation.DROP,
	};
			    
	var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var marker = new google.maps.Marker({
	  position: latLng,
	  map: map,
	  draggable:true,
	  title:cityName
    });
	google.maps.event.addListener(marker, 'dragend', function() {
		var latLng = marker.getPosition();
		var lat = latLng.lat();
		var lng = latLng.lng();
	    weatherDisplay(lat,lng);
	});

}
// =================================================================
	function weatherRender(data) {
		var html ="";
		
		$('.locationheader').html('<h2>'+ data.city.name+' '+data.city.country +'</h2>');
            // weather frame 1
            html += '<div><h3>'+ data.list[0].temp.max + '°/' +data.list[0].temp.min+'°'+ '</h3>'+'</div>';
            html += '<div><p>'+'<img src="http://openweathermap.org/img/w/'+ data.list[0].weather[0].icon + '.png">'+'</p>'+'</div>';
	        html += '<div><p>'+data.list[0].weather[0].main+': '+ data.list[0].weather[0].description + '</p>'+'</div>';
	        html += '<div><p>'+'Humidity: '+ data.list[0].humidity + '</p>'+'</div>';
	        html += '<div>'+'<p>'+'Wind: '+ data.list[0].speed +' mph' +'</p>'+'</div>';
	        html += '<div>'+'<p>'+'Pressure: '+ data.list[0].pressure + '</p>'+'</div>';
	        $('.weatherframes').html(html);

	        // weather frame 2
            html = '<div>'+'<h3>'+ data.list[1].temp.max + '°/' +data.list[1].temp.min+'° '+'</h3>'+'</div>';
            html += '<div>'+'<p>'+'<img src="http://openweathermap.org/img/w/'+ data.list[1].weather[0].icon + '.png">'+'</p>'+'</div>';
	        html += '<div>'+'<p>'+data.list[1].weather[0].main+': '+ data.list[1].weather[0].description + '</p>'+'</div>';
	        html += '<div>'+'<p>'+'Humidity: '+ data.list[1].humidity + '</p>'+'</div>';
	        html += '<div>'+'<p>'+'Wind: '+ data.list[1].speed +' mph' +'</p>'+'</div>';
	        html += '<div>'+'<p>'+'Pressure: '+ data.list[1].pressure + '</p>'+'</div>';
	        $('.weatherframes2').html(html);

	        // weather frame 3
            html = '<div>'+'<h3>'+ data.list[2].temp.max + '°/' +data.list[2].temp.min+'°'+ '</h3>'+'</div>';
            html += '<div>'+'<p>'+'<img src="http://openweathermap.org/img/w/'+ data.list[2].weather[0].icon + '.png">'+'</p>'+'</div>';
	        html += '<div>'+'<p>'+data.list[2].weather[0].main+': '+ data.list[2].weather[0].description + '</p>'+'</div>';
	        html += '<div>'+'<p>'+'Humidity: '+ data.list[2].humidity + '</p>'+'</div>';
	        html += '<div>'+'<p>'+'Wind: '+ data.list[2].speed +' mph' +'</p>'+'</div>';
	        html += '<div>'+'<p>'+'Pressure: '+ data.list[2].pressure + '</p>'+'</div>';
	        $('.weatherframes3').html(html);

			if(data.list[0].weather[0].main == "Clouds"){
				$("#body").css("background", "url(/img/Sky_cloudy.jpg) no-repeat center center fixed");
			}else if(data.list[0].weather[0].main == "Clear"){
				$("#body").css("background", "url(/img/clear_sky.jpg) no-repeat center center fixed");
			}else if(data.list[0].weather[0].main == "Rain"){
				$("#body").css("background", "url(/img/rainy_days.jpg) no-repeat center center fixed");
			}else{
				$("#body").css("background", "color:blue; url(blank)");
			}
			
	};
// ======================================
function weatherDisplay(lat,lng){
	var ajaxReq = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + lat + "&lon=" + lng + "&cnt=3", {
					    APPID: "c7b7c1d07f4ebe818d8577bb943809f6",
					    units: "imperial"
					});
					ajaxReq.always(function(){
						console.log('req sent');
					});
					ajaxReq.fail(function(data, error){
						console.log('error');
						console.log(ajaxReq.status);
					});
					ajaxReq.done(function(data){
						var cityName = data.city.name;
						weatherRender(data);
						displayMap(lat,lng,cityName)
						console.log('done');
					});
};
// ===================================
function backgroundImg(data){
	console.log(data.list[0].weather[0].main);
	console.log(data.list[1].weather[0].main);
	console.log(data.list[2].weather[0].main);
};


// ===========
//FORM INPUT ON CLICK FUNCTION

    $('#formId').on('submit',function (e) {
        e.preventDefault();
        //MAKING IT AN ARRAY FOR EASY USE
    	var json = $('form').serializeArray();
        var address = json[0].value;
		var geocoder = new google.maps.Geocoder();
		
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			    
			    var lat = results[0].geometry.location.lat();
			    var lng = results[0].geometry.location.lng();

			    weatherDisplay(lat,lng);
			    displayMap(lat,lng);

			} else {
				alert("Geocoding was not successful - STATUS: " + status);
			}
		});
	});


});


