const map = document.getElementById("myMap");

let myMap = L.map(map);

// Create map - use mapBox
L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
    accessToken:
      "pk.eyJ1IjoibWFreWZqIiwiYSI6ImNrbHJib21oNjAyZnUyb2xkZnJvcG5kZW8ifQ.EoSKv-aBqUhwqjmcH6fERg",
  }
).addTo(myMap);

myMap.locate({
  setView: true,
  maxZoom: 16,
});

// Creating icon's shadow
let leafIcon = L.Icon.extend({
  options: {
    shadowUrl: "./images/leaf-shadow.png",
    iconSize: [38, 95],
    shadowSize: [50, 64],
    iconAnchor: [22, 94],
    shadowAnchor: [4, 62],
    popupAnchor: [-3, -76],
  },
});

// multiple icons, using leafIcon
let greenIcon = new leafIcon({
    iconUrl: "./images/leaf-green.png",
  }),
  redIcon = new leafIcon({
    iconUrl: "./images/leaf-red.png",
  }),
  orangeIcon = new leafIcon({
    iconUrl: "./images/leaf-orange.png",
  });

function onLocationFound(e) {
  // Display user location
  let marker = L.marker(e.latlng, {
    icon: greenIcon,
  }).addTo(myMap);

  //
  marker.bindPopup("Your current location").openPopup();
}

myMap.on("locationfound", onLocationFound);

function onLocationError(e) {
  alert(e.message);
}

myMap.on("locationerror", onLocationError);

myMap.locate({
  setView: true,
  maxZoom: 16,
});

function mapData() {
  $.ajax({
    type: "GET",
    url: "mapData.php",
    success: function (response) {
      let responseResult = JSON.parse(response);

      // get data from mapData.php
      for (let i = 0; i < responseResult.length; i++) {
        let address = responseResult[i].address;
        let city = responseResult[i].city;
        console.log(address, city);
        let queryAddress = address + " " + city;

        console.log(i, "Query address:", queryAddress);

        // Get the provider, in this case the OpenStreetMap (OSM) provider
        const provider = new window.GeoSearch.OpenStreetMapProvider();

        // Query for address
        let queryPromise = provider.search({ query: queryAddress });

        // Wait until we have an answer on the Promise
        queryPromise.then((value) => {
          for (let j = 0; j < value.length; j++) {
            // Success
            let longitude = value[j].x;
            let latitude = value[j].y;
            let label = value[j].label;

            // Create a marker for the found coordinates
            let marker = L.marker([latitude, longitude], {
              icon: redIcon,
            }).addTo(myMap);

            // Add a popup to the said marker with the address found by geoSearch
            marker.bindPopup(label);
          }
        });
      }
    },
  });
}
$(document).ready(mapData);
