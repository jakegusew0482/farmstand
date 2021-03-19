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
  let radius = e.accuracy;

  L.marker(e.latlng).addTo(myMap);

  L.circle(e.latlng, radius).addTo(myMap);
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

// Getting data from mysql/php

function getMapData(jQuery) {
  $.ajax({
    type: "GET",
    //dataType: "jsonp",
    url: "mapData.php",
    success: function (response) {
      let showResult = JSON.parse(response);
      //let arrayData = [];
      for (let i = 0; i < showResult.length; i++) {
        let combinedAddress = showResult[i].address;
        //    getAddress.push(combinedAddress);
        console.log("COMBINED:", combinedAddress);
        $.get(
          location.protocol +
            "//nominatim.openstreetmap.org/search?format=json&q=" +
            //getAddress[0],
            combinedAddress,
          function (data) {
            let lat = parseFloat(data[0].lat).toFixed(2);
            let lon = parseFloat(data[0].lon).toFixed(2);
            console.log("lat:", lat, "lon:", lon);

            L.marker([lat, lon], {
              icon: redIcon,
            }).addTo(myMap);
          }
        );
      }
    },
  });
}

// display address
$(document).ready(getMapData);

let newAddress = "2350 NY-110, Farmingdale";
$.get(
  location.protocol +
    "//nominatim.openstreetmap.org/search?format=json&q=" +
    //getAddress[0],
    newAddress,

  function (data) {
    let lat = parseFloat(data[0].lat).toFixed(2);
    let lon = parseFloat(data[0].lon).toFixed(2);
    console.log("lat:", lat, "lon:", lon);

    L.marker([lat, lon], {
      icon: redIcon,
    }).addTo(myMap);
  }
);