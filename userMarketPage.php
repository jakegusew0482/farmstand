<!DOCTYPE html>
<html lang="en">
<?php
	include('navbar.php');
?>
<body onload='loadPage()'>
	
	<div id= "page-container">
		<div id ="ContentBox"></div>
			<!--Stand Description-->
			<div id ="FarmstandInfo">
				<?php
					include('mysqli_connect.php');
					
					if(isset($_GET['id'])) $id = $_GET['id']; else $id = NULL;

					if($id != NULL) {
						$query = "SELECT title, description, coverimage FROM farmstand WHERE farmstand_id = '$id';";
						
						$result = mysqli_query($connect, $query);

						$row = mysqli_fetch_assoc($result);

							$title = $row['title'];
							$desc = $row['description'];
							$image = $row['coverimage'];
				
							echo "<div id = 'FarmStandName'><h2>$title</h2></div>
								<div id = 'FarmStandImage'><img src='$image' height='200' width='275'></div>
								<div id = 'FarmStandAddr'><h5>$desc</h5></div>";
						}
					

					mysqli_close($connect);
				?>

				
				<!--<div id = "FarmStandName"><h2>Stand Name</h2></div>
				<div id = "FarmStandImage"><h5>Stand Image</h5></div>
				<div id = "FarmStandAddr"><h5>Stand Description</h5></div> -->
			</div>
			
			<!--Posting Area-->
			<div id = "NewsContainer">
				<div id = "NewsContainerBox"></div>
			</div>

			<!--Reviews-->
			<div id = "StandOwnerPosting">
				<div id = "StandPostingTitle"><h3>Latest Posts</h3></div>
				<div id = "StandPostingSubContainer">
					<div id = "StandPostingContent"><p>
						Place holder of text / image content
					</p></div>
				</div>
			</div>








			<!--Inventory Content-->
			<div id = "InventoryDisplayContainer">
				<!--Item Inventory COntainer-->
				<div id='products'>
				<?php /*

					include('mysqli_connect.php');
					
					if(isset($_GET['id'])) $id = $_GET['id']; else $id = NULL;

					if($id != NULL) {
						$query = "SELECT * FROM product WHERE farmstand_id = '$id';";

						$result = mysqli_query($connect, $query);

						
					
						while($row = mysqli_fetch_assoc($result)) {
							$name = $row['name'];
							$desc = $row['description'];
							$price = $row['price'];
							$image = $row['image'];
							
							
							echo"<div id = 'itemDisplayContainer'>";
							
							echo "<div id = 'ItemImage'><img src='$image' height='150' width='150'></div>
							<div id = 'ItemDescription'>	
							<div id = 'ItemName'><p>$name</p></div>
							<div id = 'ItemDescriptionBox'><p>$desc</p></div></div>
							<div id = 'SideInventoryIDContainer'>
							<div id = 'ItemQTY'></div>
							<div id = 'ItemPrice'><p>$price $</p></div>
							<button id = 'ItemReservation'></button>
							</div>

							";
							echo"</div>";
						
						}
						

					}
				mysqli_close($connect); */
				?>

				</div>
				<!--<div id = "itemDisplayContainer">
					<div id = "ItemImage"></div>
					<div id = "ItemDescription"></div>
					<div id = "ItemQTY"></div>
					<div id = "ItemPrice"></div>
					<div id = "ItemReservation"></div>
					<div id = "DeleteItem"></div>
				</div>-->
			</div>
		</div>
		
<div id = "UserReviewContainer">
			<div id = "UserReviewTitle"></div>
			<div id = "UserReviewContent">

		<!--UserReviewsArea-->
		<div id = "SideShoppingContainer">

	<div id = "ReservationInfoContainer">
		<form action="/action_page.php">
          	<h3>Item Reservation</h3>
		<p>Please fill out the following information</p>
            	<label for="fname">Name</label>
            	<input type="text" id="fname" name="firstname" placeholder="First and Last Name">
            	<label for="Phone Number"><i id="PhoneNumber"></i> Phone Number</label>
            	<input type="text" id="PhoneNumber" name="Phone Number" placeholder="555-555-5555">  
      		</form>
	<label for="PaymentReservation">Payment Type?</label>

<select name="PaymentTime" id="PaymentTime">
  <option value="Arrival">Pay at the stand</option>
  <option value="">Pay Now using online processing</option>
</select>


	</div>


	<div id = "InventoryReservationContainer">

		<h4>Reservation Cart </h4><span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
	</div>

	<div id = "ConfirmReservationButton">
		<input type="submit" value="Confirm Reservation" class="btn">
	</div>
</div>
</div>
		</div>
		</div></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function loadPage() {
loadPosts();
loadProducts();
}


function loadPosts() {
var id = "<?php echo $_GET['id']; ?>";

	if(id != 0) {
		$.ajax({
		url: "userPostData.php",
		type: "POST",
		data: {id:id},
		dataType: "html",
		success: function(data) {
		var result = $('<div />').append(data).find('#result').html();
            	$('#StandPostingContent').html(result);						
		}
	});

	} else {

	}
}
function loadProducts() {
var id = "<?php echo $_GET['id']; ?>";
if(id != 0) {
$.ajax({
						url: "userProductData.php",
						type: "POST",
						data: {id:id},
						dataType: "html",
						success: function(data) {
						var result = $('<div />').append(data).find('#result').html();
            					$('#products').html(result);						}
					});
} else {

}
}

</script>

</body>
</html>
