var map = L.map("map", {
  center: [51.5, -0.1], // CAREFULL!!! The first position corresponds to the lat (y) and the second to the lon (x)
  zoom: 12,
});

// Add tiles (streets, etc)
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
).addTo(map);

var query_addr = "42 Vernon St Patchogue";

// Get the provider, in this case the OpenStreetMap (OSM) provider.
const provider = new window.GeoSearch.OpenStreetMapProvider();

// Query for the address
var query_promise = provider.search({ query: query_addr });

// Wait until we have an answer on the Promise
query_promise.then(
  (value) => {
    for (i = 0; i < value.length; i++) {
      // Success!
      var x_coor = value[i].x;
      var y_coor = value[i].y;
      var label = value[i].label;
      // Create a marker for the found coordinates
      // CAREFULL!!! The first position corresponds to the lat (y) and the second to the lon (x)
      var marker = L.marker([y_coor, x_coor]).addTo(map);
      // Add a popup to said marker with the address found by geosearch (not the one from the user)
      marker.bindPopup("<b>Found location</b><br>" + label).openPopup();
    }
  },
  (reason) => {
    console.log(reason); // Error!
  }
);
