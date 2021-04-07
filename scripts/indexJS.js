const findNearMe = document.getElementById("getLocation");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    findNearMe.innerHTML = "Geolocation is not supported by this browser";
  }
}

/* How to get longitude and latitude Google Maps
function showPosition(position) {
  let lat = position.coords.latitude;
  let long = position.coords.longitude;
  let url =
    "https://maps.googleapis.com/maps/api/geocode/json?latIng=" +
    lat +
    "," +
    long +
    "&key=YOUR_API_KEY";

  $.ajax({
    type: "GET",
    url: url,
    dataType: "json",
    success: function (msg) {
      let results = msg.results;
      let zip = results[0].address_components[6].long_name;
      alert("Your zip code is: " + zip);
    },
    error: function (req, status, error) {
      alert("Sorry, an error occurred.");
      console.log(req.responseText);
      console.log(status.responseText);
      console.log(error.responseText);
    },
  });
}

*/
