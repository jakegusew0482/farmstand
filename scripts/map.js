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

// search and searchType
const search = document.getElementById("search").value;
const searchtype = document.getElementById("searchType").value;


// Getting data from mysql/php farmstand and display on map
function getMapData(jQuery) {
  $.ajax({
    // from GET to POST, for search for farmstand
    type: "GET",
	headers: {'Access-Control-Allow-Origin': '*'},
    url: "mapData.php",
	  dataType: "json",
    // Added for search for farmstand
    //data: { search: search, searchtype: searchtype },
    success: function (response) {
      let showResult = response;
      // get data from all
      //for (let i = 0; i < showResult.length; i++) {
      for (let i = 0; i < 10; i++) {
        let address = showResult[i].address;
        let title = showResult[i].title;
        let farmstand_id = showResult[i].farmstand_id;
        // Debug purposes
         console.log("Data:", address);

        jQuery.get(location.protocol +
            "//nominatim.openstreetmap.org/search?format=json&q=" +
            address,

		// Data from nonimatim.openstreetmap
          function (data) {
            let lat = parseFloat(data[0].lat).toFixed(2);
            let lon = parseFloat(data[0].lon).toFixed(2);

            // Debug purposes
            console.log("lat:", lat, "lon:", lon);
            // Add each address to the map with redICon
            let marker = L.marker([lat, lon], {
              icon: redIcon,
            }).addTo(myMap);
	console.log(myMap);

            marker.bindPopup(
              `${title}<br/><a href="https://www.farmstandwebsite.com/userMarketPage.php?id=${farmstand_id}">Visit this farmstand</a>`
            );
          }
        );
      }
    }
  });
}
// calling getMapData fun
$(document).ready(getMapData);
