
var modal = document.getElementById('createFarmStand');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



/*
  Gets info for the farm stand location and description
*/

document.getElementById("submit").onclick = function() {myFunction()};

function myFunction() {
  var StandName = document.getElementById("sName").nodeValue;
  var StandDescription = document.getElementById("sDescription").nodeValue;
  var StandAddress = document.getElementById("address").nodeValue;
  var StandCity = document.getElementById("city").nodeValue;
  var StandState = document.getElementById("state").nodeValue;
  var StandZip = document.getElementById("zip").nodeValue;
  var StandImage = document.getElementById("StandImage");
}


/*
  Gets info check boxes and stores images
*/

document.getElementById("submit").onclick = function() {myFunction()};

function myFunction() {
  var VegetablesBox = document.getElementById("Vegetables").value;
  var FruitsBox = document.getElementById("Fruits").value;
  var ProduceBox = document.getElementById("Produce").value;
  var MilkMeatEggsBox = document.getElementById("MilkMeatEggs").value;
  var BakedGoods = document.getElementById("BakedGoods").value;
  var FlowersPlantsSeedlingsBox = document.getElementById("FlowersPlantsSeedlings").value;
  var PreparedFoodsBox = document.getElementById("PreparedFoods").value;
  var ArtsCraftsBox = document.getElementById("ArtsCrafts").value;
  var UniqueGoodsBox = document.getElementById("UniqueGoods").value;

}










