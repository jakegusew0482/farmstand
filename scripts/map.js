const map = document.getElementById("myMap");

// Create base layer map - use mapBox
let streets = L.tileLayer(
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
);

// Create overlay layer for map
let farmstandsMarkers = L.layerGroup();

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

// create map
let myMap = L.map(map, {
  center: [39.73, -104.99],
  zoom: 10,
  layers: [streets, farmstandsMarkers],
});

myMap.locate({
  setView: true,
  maxZoom: 16,
});

function onLocationFound(e) {
  // Display user location
  let marker = L.marker(e.latlng, {
    icon: greenIcon,
    zoom: 4,
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

// base layer
let baseMaps = {
  Streets: streets,
};

// overlays
let overlays = {
  Farmstands: farmstandsMarkers,
};

L.control.layers(baseMaps, overlays).addTo(myMap);

// search and searchType
$(document).ready(function () {
  $("#searchForm").on("submit", function (e) {
    e.preventDefault();

    // Get values of search farmstand
    const searchType = document.getElementById("searchType").value;
    const searchTerm = document.getElementById("searchTerm").value;

    // Removes previous markers from base layer
    farmstandsMarkers.clearLayers();

    if (searchTerm != "") {
      // ajax call
      $.ajax({
        url: "mapData.php",
	      crossDomain: true,
        type: "POST",
        dataType: "json",
        data: { searchType: searchType, searchTerm: searchTerm },
        success: function (response) {
          let showResult = response;

          // get data based on the query from searchTerm
          for (let i = 0; i < showResult.length; i++) {
            let address = showResult[i].address;
            let title = showResult[i].title;
            //let farmstand_id = showResult[i].id;

            // for server
            let farmstand_id = showResult[i].farmstand_id;

            console.log("ZipCode", showResult[i].zipCode);

            jQuery.get(
              "https://nominatim.openstreetmap.org/search?format=json&q=" +
                address,

              function (data) {
                let lat = parseFloat(data[0].lat).toFixed(2);
                let lon = parseFloat(data[0].lon).toFixed(2);

                // Add each address to the map with redICon
                let marker = L.marker([lat, lon], {
                  icon: redIcon,
                }).addTo(farmstandsMarkers);

                marker
                  .bindPopup(
                    `${title}<br/><a href="userMarketPage.php?id=${farmstand_id}">Visit this farmstand</a>`
                  )
                  .openPopup();
              }
            );
          }
        },
      });
    } else {
      $.ajax({
        // from GET to POST, for search for farmstand
        type: "POST",
        dataType: "json",
        url: "mapData.php",
	      xhrFields: {
	        	withCredentials: true
	        },
	      crossDomain: true,
        // Added for search for farmstand
        //   data: { search: search, searchtype: searchtype },
        success: function (response) {
          let showResult = response;

          // get data from all
          for (let i = 0; i < showResult.length; i++) {
            let address = showResult[i].address;
            let title = showResult[i].title;
            //let farmstand_id = showResult[i].id;
            // for server
            let farmstand_id = showResult[i].farmstand_id;

            jQuery.get(
              "https://nominatim.openstreetmap.org/search?format=json&q=" +
                address,

              function (data) {
                let lat = parseFloat(data[0].lat).toFixed(2);
                let lon = parseFloat(data[0].lon).toFixed(2);

                // Add markers to layer group - farmstandsMarkers
                L.marker([lat, lon], {
                  icon: redIcon,
                })
                  .bindPopup(
                    `${title}<br/><a href="userMarketPage.php?id=${farmstand_id}">Visit this farmstand</a>`
                  )
                  .addTo(farmstandsMarkers);
              }
            );
          }
        },
      });
    }
  });
});
