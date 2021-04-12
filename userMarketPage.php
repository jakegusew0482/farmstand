<!DOCTYPE html>
<html lang="en">

<?php
// User market page, this is the market page from the perspective of the customer
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
				<div id = "StandPostingTitle"><h3>Reviews</h3></div>
				<div id = "StandPostingSubContainer">
					<div id = "StandPostingContent"></div>
				</div>
			</div>

			<!--Inventory Content-->
			<div id = "InventoryDisplayContainer">
				<!--Item Inventory COntainer-->
				<div id='products'>
	
				</div>
			</div>
		</div>
		
		<div id = "UserReviewContainer">
			<!--UserReviewsArea-->
			<div id = "SideShoppingContainer"style='height:90%; overflow:scroll; overflow-x:hidden;'>

			<div id = "ReservationInfoContainer" >
			<div id='cartresult' name = 'cartresult' >
		</div>
	</div>
</div>
	
	<div id = 'ConfirmReservationButton' style='bottom:0px;'>
	<button type='button' value='Checkout' class='btn' role="link" id="checkout-button">checkout</button>
	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function loadPage() {
	//loadPosts();
	loadReviews();
	loadProducts();
	loadCart();
}

$(document).ready(function(e) {
	$("#productview").on('submit', (function(e) {
		e.preventDefault();
		
		$.ajax({
			url: "addToCart.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				if(response == 1) {
					loadCart();
				} else {
					alert('Error adding item');
				}
			}
		});
	}));
});

function loadReviews() {
	var fid = "<?php echo $_GET['id']; ?>";
	var uid = "<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; else echo 0; ?>";
	var loggedin = "<?php if(isset($_SESSION['user_id'])) echo 1; else echo 0; ?>";
	if(fid != 0) {
		$.ajax({
			url: "getUserMarketReviews.php",
			type: "POST",
			data: {loggedin:loggedin,fid:fid, uid:uid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#result').html();
            		$('#StandPostingContent').html(result);						
			}
		});
	}
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
		alert('Could not load posts');
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
            		$('#products').html(result);						
			}
		});
	} else {
		alert('Could not load products');
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

function addToCart(user_id, product_id, farmstand_id, quantity) {
quantity = 2;
$.ajax({
	url: "addToCart.php",
	type: "POST",
	data:{user_id:user_id, product_id:product_id, farmstand_id:farmstand_id,quantity:quantity},
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

function submitReview() {
	var fid = "<?php echo $_GET['id']; ?>";
	var uid = "<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; else echo 0; ?>";
	var reviewtext = document.getElementById('reviewtext').value;

	if ($('input[id=star-5]:checked').length > 0) {
		var rating = 5;
	} else if ($('input[id=star-4]:checked').length > 0) {
		var rating = 4;
	} else if ($('input[id=star-3]:checked').length > 0) {
		var rating = 3;
	} else if ($('input[id=star-2]:checked').length > 0) {
		var rating = 2;
	} else {
		var rating = 1;
	}

	if (fid != "" && uid != "" && reviewtext != "" && rating != "") {
		$.ajax({
			url: "insertUserReview.php",
			type: "POST",
			data:{uid:uid, fid:fid, rating:rating, reviewtext:reviewtext},
			success:function(response) {
				if(response == 1) {
					loadReviews();
				} else {
					alert('Error adding review');
				}
			}
		});
	} else if (reviewtext == "") {
		alert('Please add a message to your review!'); 
	} else {
		alert('Error adding review');
	}


}

function removeMyReview(rid) {
	
	if(rid != "" && confirm('Delete Review?')) {
		$.ajax({
			url: "removeUserReview.php",
			type: "POST",
			data:{rid:rid},
			success:function(response) {
				if(response == 1) {
					loadReviews();
				} else {
					alert('Error deleting review');
				}
			}
		});
	}

}

</script>
<script src="./paymentPage/js/charge.js"></script>

</body>
</html>