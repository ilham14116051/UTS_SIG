<!DOCTYPE html>
<html>
<head>
<title>UTS Sistem Informasi Geografis 14116051 ilham</title>
<link rel="stylesheet" type="text/css" href="<?base_url('assets/js/leaflet-search/dist/leaflet-search-min.css')?>">
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="<?base_url('assets/js/leaflet-search/dist/leaflet-search-src.js')?>">
   </script>
   <style type="text/css">
   	
   	#map { height: 100vh; }

   </style>
</head>


<body>
    <div id="map"></div>

</body>
		 <!-- Make sure you put this AFTER Leaflet's CSS -->
		 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		   crossorigin=""></script>
		   <script src="assets/geojson/balam.geojson"></script>
		   <script src="assets/js/leaflet.ajax.js"></script>


   <script type="text/javascript">





		   	var mymap = L.map('map').setView([-5.4286681,105.2006971], 10);
		   	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    maxZoom: 18,
		    id: 'mapbox/streets-v11',
		    tileSize: 512,
		    zoomOffset: -1,
		    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
		}).addTo(mymap);



					var geojsonFeature = {
				    "type": "Feature",
				    "properties": {
				        "name": "mylocation",
				        "popupContent": 'NAMOBJ'
				    },
				    "geometry": {
				        "type": "Point",
				        "coordinates": [105.2892012,-5.3822483]
				    }


				};


			   	function popUp(f,l){
			    var out = [];
			    if (f.properties){
			        for(key in f.properties){
			            console.log(key);
			        }
			        
			        out.push("Kecamatan : "+f.properties['NAMOBJ']);
			        l.bindPopup(out.join("<br />"));
			    }
			}

			var jsonTest = new L.GeoJSON.AJAX(["assets/geojson/balam.geojson"],{onEachFeature:popUp}).addTo(mymap);

			

		L.control.search({
		layer: poiLayers,
		initial: false,
		propertyName: 'name',
		buildTip: function(text, val) {
			//var type = val.layer.feature.properties.amenity;
			return '<a href="#"'+text+'</a>';
		}
	})
	.addTo(map);
			</script>

			<script type="text/javascript">

		L.geoJSON(geojsonFeature).addTo(mymap);


   </script>
</html>