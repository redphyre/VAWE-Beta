	<script type="text/javascript">
	$(document).ready(function($) {

      function initMap() {
		  
		var citymap = {
			Birchwood: {
			  center: {lat: 45.640301, lng: -91.577599},
			  population: 442
        }
      };
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 12,
          center: {lat: 45.640301, lng: -91.577599},
          mapTypeId: 'roadmap'
        });

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#6EB02D',
            strokeOpacity: 1.0,
            strokeWeight: 3,
            fillColor: '#ED248F',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100
          });
        }
		  
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">My Event</h1>'+
            '<div id="bodyContent">'+
            'This is the location of my event party. ' +
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
        	content: contentString
        });
		  
		marker = new google.maps.Marker({
			map: map,
			draggable: true,
			animation: google.maps.Animation.DROP,
			position: {lat: 45.640301, lng: -91.577599},
			title: 'My Event'
			
		});
		  
		marker.addListener('click', function() {
			infowindow.open(map, marker);
		});
	}
	})(window);
    </script>