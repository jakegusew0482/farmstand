<?php include('navbar.php'); ?>

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
	// ajax call
	let ajax = new XMLHttpRequest();
	let method = "GET";
	let url = "mapData.php"
	let asynchronous = true;

	ajax.open(method, url, asynchronous);

	// send ajax request
	ajax.send();

	// receive response from mapData.php
	ajax.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			let data = JSON.parse(this.responseText);
			console.log(data);

			let html = "";
			//
			// html value for <tbody>
			for (let i = 0; i < data.length; i++) {
				let title = data[i].title;
				let address = data[i].address;
				let city = data[i].city;
				let state = data[i].state;
				let zipCode = data[i].zipCode;

				// appending at html
				html = title + " " + address + " " + city + " " + state + " " + zipCode;

			}

			// replacing the <tbody>
			document.getElementById("data").innerText = html;
		}
	}
</script>
</div>

<script>
	// call ajax
</script>
