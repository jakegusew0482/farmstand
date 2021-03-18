	<?php include('navbar.php'); ?>

	<!-- Side Column of Main Page -->
	<div class="row">
		<div class="side">
			<h2>Support Your Local Farm Stand</h2>
			<h3>Search by Type of goods</h3>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Type of stand" />

		</div>

		<!--Main Page-->
		<div class="main">
			<h4>Local Farm Stand News</h4>
			<p>login status:</p>
			<p id='login'></p>
			<div id="myMap" style="height: 400px"></div>
			<script>
				let myMap = L.map("myMap");

				// Create map - use mapBox
				L.tileLayer(
					"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
						attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
						maxZoom: 18,
						id: "mapbox/streets-v11",
						tileSize: 512,
						zoomOffset: -1,
						accessToken: "pk.eyJ1IjoibWFreWZqIiwiYSI6ImNrbHJib21oNjAyZnUyb2xkZnJvcG5kZW8ifQ.EoSKv-aBqUhwqjmcH6fERg",
					}
				).addTo(myMap);

				myMap.locate({
					setView: true,
					maxZoom: 16
				});

				let leafIcon = L.Icon.extend({
					options: {
						shadowUrl: './images/leaf-shadow.png',
						iconSize: [38, 95],
						shadowSize: [50, 64],
						iconAnchor: [22, 94],
						shadowAnchor: [4, 62],
						popupAnchor: [-3, -76]
					}
				})

				let greenIcon = new leafIcon({
						iconUrl: './images/leaf-green.png'
					}),
					redIcon = new leafIcon({
						iconUrl: "./images/leaf-green.png"
					}),
					orangeIcon = new leafIcon({
						iconUrl: "./images/leaf-orange.png"
					});

				function onLocationFound(e) {
					let radius = e.accuracy;

					L.marker(e.latlng, {
						icon: greenIcon
					}).addTo(myMap);

					L.circle(e.latlng, radius).addTo(myMap);
				}

				myMap.on('locationfound', onLocationFound);

				function onLocationError(e) {
					alert(e.message);
				}

				myMap.on('locationerror', onLocationError);

				myMap.locate({
					setView: true,
					maxZoom: 16
				});
			</script>
		</div>
	</div>

	<div class="footer">
		<h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
	</div>
	</body>

	</html>
	<script language='Javascript' type='text/javascript'>
		let address = "42 Vernon st";
		$.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q=' + address, function(data) {
			console.log(data);
		});
	</script>
