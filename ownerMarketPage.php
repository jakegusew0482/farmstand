<!DOCTYPE html>
<html lang="en">
<?php
	include('navbar.php');
?>
<body onload='loadPage();' style="background-image: url('/images/MarketPageFarmBg.jpg');>
	
	<div id= "page-container">
		<div id ="ContentBox"></div>
			<!--Stand Description-->
			<div id ="FarmstandInfo">
				<?php
					include('mysqli_connect.php');
					
					if(isset($_SESSION['farm_id'])) $id = $_SESSION['farm_id']; else $id = NULL;

					if($id != NULL) {
						$query = "SELECT title, description, coverimage FROM farmstand WHERE farmstand_id = '$id';";
						
						$result = mysqli_query($connect, $query);

						$row = mysqli_fetch_assoc($result);

							$title = $row['title'];
							$desc = $row['description'];
							$image = $row['coverimage'];
				
							echo "<div id = 'FarmStandName'><h2>$title</h2></div>
								<div id = 'FarmStandImage'><img src='$image' height='100%' width='100%'></div>
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

<div class="form-popup" id="postForm">
			
  <form id='addpostform' name='addpostform' method='post' action='addPost.php' enctype='multipart/form-data' class="form-container">

    						<label for="posttitle"><b>Post Title</b></label>
    						<input type="text" placeholder="Post Title Name" name="posttitle" id="posttitle" required>

    						<label for="postdesc"><b>Description</b></label>
   						<input type="text" placeholder="Post Description" name="postdesc" id="postdesc" required>			

						<br><br>
						<?php $id = $_SESSION['farm_id'];
							echo "<input style='display:none;' id='postid' name = 'postid' value='$id'>"; ?>  
	<input type="submit" class="btn"/>	
    <button  class="btn cancel" onclick="closePostForm()">Close</button>
  </form>
</div>

				<div id = "StandPostingTitle"><h3>Latest Posts</h3></div>
				<div id = "StandPostingSubContainer">
<button class='open-button' onClick='openPostForm()' id = 'addpost'>Add Post</button>
					<div id = "StandPostingContent">

					</div>
				</div>
			</div>








			<!--Inventory Content-->
			<div id = "InventoryDisplayContainer">
				<!--Item Inventory COntainer-->
	<button class='open-button' onClick='openForm()' id = 'additem'>Add Item</button>
				<div class="form-popup" id="myForm">
			
  <form id='productform' name='productform' method='post' action='addProduct.php' enctype='multipart/form-data' class="form-container">

    						<label for="name"><b>Product Name</b></label>
    						<input type="text" placeholder="Product Name" name="name" id="name" required>

    						<label for="desc"><b>Description</b></label>
   						<input type="text" placeholder="Product Description" name="desc" id="desc" required>

						
						<input type="number"  id="price" name="price"><br><br>

						<label for="files">Select file:</label>
						<input id="uploadImage" type="file" accept="image/*" name="image" /><br><br>
						<?php $id = $_SESSION['farm_id'];
							echo "<input style='display:none;' id='id' name = 'id' value='$id'>"; ?>  
	<input type="submit" class="btn"/>	
    <button class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<div class="form-popup" id="editForm">
			
  <form id='editproductform' name='editproductform' method='post' action='editProduct.php' enctype='multipart/form-data' class="form-container">

    						<label for="editname"><b>Product Name</b></label>
    						<input type="text" placeholder="Product Name" name="editname" id="editname" required>

    						<label for="editdesc"><b>Description</b></label>
   						<input type="text" placeholder="Product Description" name="editdesc" id="editdesc" required>

						<input type="text" name="editid" id="editid"  style='display:none;'>

						
						<input type="number"  id="editprice" name="editprice"><br><br>

						<br><br>
						<?php $id = $_SESSION['farm_id'];
							echo "<input style='display:none;' id='editid' name = 'editid' value='$id'>"; ?>  
	<input type="submit" class="btn"/>	
    <button class="btn cancel" onclick="closeEditForm()">Close</button>
  </form>
</div>


				<div id='products'>
					
				</div>
			</div>
		</div>
		


		<!--UserReviewsArea-->
		<div id = "UserReviewContainer">
			<div id = "UserReviewTitle"></div>
			<div id = "UserReviewContent">
				<script src="https://apps.elfsight.com/p/platform.js" defer></script>
				<div class="elfsight-app-129dc7ae-caf3-4312-898c-2125deb522a0"></div>



			</div>
		</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
	$("#productform").on('submit', (function(e) {
		e.preventDefault();

		var name = document.getElementById('name').value;
		var desc = document.getElementById('desc').value;
		var price = document.getElementById('price').value;
		var file = document.getElementById('uploadImage').files.length;
		var id = document.getElementById('id').value;

		if (name != "" && desc != "" && price != "" && file > 0) {
			$.ajax({
				url: "addProduct.php",
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(response) {
					if (response==1) {
						$("#productform")[0].reset();
						closeForm();
						loadProducts();
					} else {
						alert('Error adding product');
					}

					}
			});
		} else {
			alert('error');
		}
	}));
});

$(document).ready(function(e) {
	$("#editproductform").on('submit', (function(e) {
		e.preventDefault();

		var name = document.getElementById('editname').value;
		var desc = document.getElementById('editdesc').value;
		var price = document.getElementById('editprice').value;
		var id = document.getElementById('editid').value;

		$.ajax({
			url: "editProduct.php",
			type: "POST",
			data: {name:name, desc:desc, price:price, id:id},
			success: function(response) {
				if (response==1) {
					$("#editproductform")[0].reset();
					closeEditForm();
					loadProducts();
				} else {
					alert('Error adding product');
				}


			}


		});

	}));
});

$(document).ready(function(e) {
	$("#addpostform").on('submit', (function(e) {
		e.preventDefault();

		var title = document.getElementById('posttitle').value;
		var desc = document.getElementById('postdesc').value;
		var id = document.getElementById('postid').value;
		

		if (title != "" && desc != "" && id != "") {
			$.ajax({
				url: "addPost.php",
				type: "POST",
				data: {title:title,desc:desc,id:id},
				success: function(response) {
					if (response==1) {
						$("#addpostform")[0].reset();
						closePostForm();
						loadPosts();
					} else {
						alert('Error adding post');
					}

					}
			});
		} else {
			alert('error');
		}
	}));
});


function loadPage() {
loadPosts();
loadProducts();
}


function openPostForm() {
  	document.getElementById("postForm").style.display = "block";
 	document.getElementById('addpost').style.display = "none";
}

function closePostForm() {
  	document.getElementById("postForm").style.display = "none";
 	document.getElementById('addpost').style.display = "block";
							$("#addpostform")[0].reset();

}

function loadPosts() {
var id = "<?php echo $_SESSION['farm_id']; ?>";

	if(id != 0) {
		$.ajax({
		url: "ownerPostData.php",
		type: "POST",
		data: {id:id},
		dataType: "html",
		success: function(data) {
		var result = $('<div />').append(data).find('#result').html();
            	$('#StandPostingContent').html(result);						
		}
	});

	}
}


function loadProducts() {
var id = "<?php echo $_SESSION['farm_id']; ?>";
if(id != 0) {
$.ajax({
		url: "ownerProductData.php",
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

function removePost(postid) {

if(confirm('Delete Post?')) {
$.ajax({
		url: "removePost.php",
		type: "POST",
		data: {postid:postid},
		success: function(data) {
			loadPosts();
		}
	});
} else {
}
}


function remove(productid) {

if(confirm('Delete Product?')) {
$.ajax({
		url: "removeProduct.php",
		type: "POST",
		data: {productid:productid},
		success: function(data) {
			loadProducts();
		}
	});
}
}

function editItem(id) {

openEditForm();

$.ajax({
	url: "editProductData.php",
	type: "POST",
	data: {id:id},
	dataType: "JSON",
	success: function(data) {
		document.getElementById('editname').value = data[0].name;
		document.getElementById('editdesc').value = data[0].desc;
		document.getElementById('editprice').value = Number(data[0].price);
		document.getElementById('editid').value = data[0].id;

	}
});

}

function openForm() {
  	document.getElementById("myForm").style.display = "block";
 	document.getElementById('additem').style.display = "none";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
	document.getElementById('additem').style.display = "block";
						$("#productform")[0].reset();

}

function openEditForm() {
 	document.getElementById('editForm').style.display = "block";
}

function closeEditForm() {
	document.getElementById("editForm").style.display = "none";
						$("#editproductform")[0].reset();

}


			
</script>


</body>
</html>
