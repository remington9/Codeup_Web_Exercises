var ajaxRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
		    APPID: "c7b7c1d07f4ebe818d8577bb943809f6",
		    q:     "Bulverde, TX",
		    units:"imperial",
		    cnt:"3"
		    
		});
		ajaxRequest.always(function(){
			console.log('request sent');
		});

		ajaxRequest.fail(function(){
			console.log(error);
			console.log(ajaxRequest.status);
		});

		ajaxRequest.done(function(data){
			console.log(data);
			// location title
            $('.locationheader').append('<h2>'+ data.city.name+' '+data.city.country +'</h2>');

            // weather frame 1
            $('.weatherframes').append('<div>'+'<h3>'+ data.list[0].temp.max + '°/' +data.list[0].temp.min+'°'+ '</h3>'+'</div>');
            $('.weatherframes').append('<div>'+'<p>'+'<img src="http://openweathermap.org/img/w/'+ data.list[0].weather[0].icon + '.png">'+'</p>'+'</div>');
	        $('.weatherframes').append('<div>'+'<p>'+data.list[0].weather[0].main+': '+ data.list[0].weather[0].description + '</p>'+'</div>');
	        $('.weatherframes').append('<div>'+'<p>'+'Humidity: '+ data.list[0].humidity + '</p>'+'</div>');
	        $('.weatherframes').append('<div>'+'<p>'+'Wind: '+ data.list[0].speed +' mph' +'</p>'+'</div>');
	        $('.weatherframes').append('<div>'+'<p>'+'Pressure: '+ data.list[0].pressure + '</p>'+'</div>');

	        // weather frame 2
            $('.weatherframes2').append('<div>'+'<h3>'+ data.list[1].temp.max + '°/' +data.list[1].temp.min+'° '+'</h3>'+'</div>');
            $('.weatherframes2').append('<div>'+'<p>'+'<img src="http://openweathermap.org/img/w/'+ data.list[1].weather[0].icon + '.png">'+'</p>'+'</div>');
	        $('.weatherframes2').append('<div>'+'<p>'+data.list[1].weather[0].main+': '+ data.list[1].weather[0].description + '</p>'+'</div>');
	        $('.weatherframes2').append('<div>'+'<p>'+'Humidity: '+ data.list[1].humidity + '</p>'+'</div>');
	        $('.weatherframes2').append('<div>'+'<p>'+'Wind: '+ data.list[1].speed +' mph' +'</p>'+'</div>');
	        $('.weatherframes2').append('<div>'+'<p>'+'Pressure: '+ data.list[1].pressure + '</p>'+'</div>');

	        // weather frame 3
            $('.weatherframes3').append('<div>'+'<h3>'+ data.list[2].temp.max + '°/' +data.list[2].temp.min+'°'+ '</h3>'+'</div>');
            $('.weatherframes3').append('<div>'+'<p>'+'<img src="http://openweathermap.org/img/w/'+ data.list[2].weather[0].icon + '.png">'+'</p>'+'</div>');
	        $('.weatherframes3').append('<div>'+'<p>'+data.list[2].weather[0].main+': '+ data.list[2].weather[0].description + '</p>'+'</div>');
	        $('.weatherframes3').append('<div>'+'<p>'+'Humidity: '+ data.list[2].humidity + '</p>'+'</div>');
	        $('.weatherframes3').append('<div>'+'<p>'+'Wind: '+ data.list[2].speed +' mph' +'</p>'+'</div>');
	        $('.weatherframes3').append('<div>'+'<p>'+'Pressure: '+ data.list[2].pressure + '</p>'+'</div>');
});




(function(){
	var address = "14250 San Pedro Ave San Antonio, TX 78232";
	var geocoder = new google.maps.Geocoder();
// map1====================================================================
        // Geocode our address
        geocoder.geocode( { 'address': address}, function(results, status) {
          console.log(results);
          // Check for a successful result
          if (status == google.maps.GeocoderStatus.OK) {
            var mapOptions = {
              zoom: 5,
              center: results[0].geometry.location,
              zoomControl: true,
              zoomControlOptions: {
                style:google.maps.ZoomControlStyle.SMALL
              }
            }
            // Render the map
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
            var marker = new google.maps.Marker({
              position: results[0].geometry.location,
              map: map
            });
            var infowindow = new google.maps.InfoWindow({
              content: 'Alamo Cafe 14250 San Pedro Ave San Antonio, TX 78232'
            });
            // infowindow.open(map,marker);
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
            });
          } else {
            // Show an error message with the status if our request fails
            alert("Geocoding was not successful - STATUS: " + status);
          }
        });

})();








