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
								<div id = 'FarmStandImage'><img src='$image' height='200' width='150'></div>
								<div id = 'FarmStandAddr'><h5>$desc</h5></div>";
						}
					

					mysqli_close($connect);
				?>
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
	
				</div>
			</div>
		</div>
		
<?php

	if(isset($_SESSION['user_id'])) {
		include('loggedInCart');
	}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function loadPage() {
loadPosts();
loadProducts();
loadCart();
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

function loadCart() {
var fid = "<?php echo $_GET['id']; ?>";
var uid = "<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>";

if (fid != "" && uid != "") {
	$.ajax({
		url: "cartData.php",
		type: "POST",
		data: {user_id:uid,farmstand_id:fid},
		dataType: "html",
		success: function(data) {
			var result = $('<div />').append(data).find('#result').html();
            		$('#cartresult').html(result);	
		}
	});
}

}

function addToCart(user_id, product_id, farmstand_id) {
$.ajax({
	url: "addToCart.php",
	type: "POST",
	data:{user_id:user_id, product_id:product_id, farmstand_id:farmstand_id},
	success:function(response) {
		if(response == 1) {
			loadCart();
		} else {
			alert('Error adding item');
		}
	}
});
	
}

function removeFromCart(cart_id) {
$.ajax({
	url: "removeFromCart.php",
	type: "POST",
	data: {cart_id:cart_id},
	success: function(response) {
		if (response == 1) {
			loadCart();			
		} else {
			alert("could not remove item");
		}
	}
});
}

</script>

</body>
</html>
