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

				function onLocationFound(e) {
					let radius = e.accuracy;

					L.marker(e.latlng).addTo(myMap);

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

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script language='Javascript' type='text/javascript'>


	</script>
