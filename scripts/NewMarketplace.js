function vallPassToNextPage()
{
  var StandName = document.getElementById("sName").value;
  var StandDescription = document.getElementById("sDescription").value;
  var StandAddress = document.getElementById("address").value;
  var StandCity = document.getElementById("city").value;
  var StandState = document.getElementById("state").value;
  var StandZip = document.getElementById("zip").value;
  var StandImage = document.getElementById("StandImage");


  localStorage.setItem("StandName",StandName);
  localStorage.setItem("StandDescription",StandDescription);
  localStorage.setItem("StandAddress",StandAddress);
  localStorage.setItem("StandCity",StandCity);
  localStorage.setItem("StandState",StandState);
  localStorage.setItem("StandZip",StandZip);
  localStorage.setItem("StandImage",StandImage);


  return false;

}
















/*
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

*/

/*Modal close when clicked outside of area*/

var modal = document.getElementById('createFarmStand');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}




AddItemsButton.onclick = function() {
  modal.style.display = "block";
}


