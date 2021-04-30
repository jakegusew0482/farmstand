<!DOCTYPE html>
<html lang="en">
<?php
// Owner market page, this is the market page from the point of view of a farmstand owner
	include('navbar.php');
?>
<body onload='loadPage()'>
	
	<div id= "page-container">
		<div id ="ContentBox"></div>
			<!--Stand Description-->
			<div id ="FarmstandInfo">

			
				<div class="form-popup" id="farmForm">

 					<form id='editFarmform' name='editFarmform' method='post' action='editFarm.php' enctype='multipart/form-data' class="form-container">

    						<label for="farmtitle"><b>Farmstand Title</b></label>
    						<input type="text" placeholder="Farmstand title" name="farmtitle" id="farmtitle" required>

    						<label for="farmdesc"><b>Farmstand Description</b></label>
   						<input type="text" placeholder="Farmstand Description" name="farmdesc" id="farmdesc" required>

						<label for="files">Select file:</label>
						<input id="uploadImage" type="file" accept="image/*" name="image" />			
						<span id='editfarmerror' style='color:red;'></span>

						<br><br>
						<?php $id = $_SESSION['farm_id'];
							echo "<input style='display:none;' id='id' name = 'id' value='$id'>"; ?>  

						<input type="submit" class="btn"/>	
    						<button  class="btn cancel" onclick="closeFarmForm()">Close</button>
  					</form>
			</div>

			<button class='open-button' onClick='editFarmInfo()' id = 'editfarm'>Edit Farmstand Info</button>
			<div id='farminfo'></div>
			</div>
			
			<!--Posting Area-->
			<div id = "NewsContainer">
			<div class="form-popup" id="postForm">

  			<form id='addpostform' name='addpostform' method='post' action='addPost.php' enctype='multipart/form-data' class="form-container">

    						<label for="posttitle"><b>Post Title</b></label>
    						<input type="text" placeholder="Post Title Name" name="posttitle" id="posttitle" required>

    						<label for="postdesc"><b>Description</b></label>
   						<input type="text" placeholder="Post Description" name="postdesc" id="postdesc" required>			

						<br><br>
						<span id='posterror' style='color:red;'></span>
						<?php $id = $_SESSION['farm_id'];
							echo "<input style='display:none;' id='postid' name = 'postid' value='$id'>"; ?>  
						<input type="submit" class="btn"/>	
    						<button  class="btn cancel" onclick="closePostForm()">Close</button>
  			</form>
			</div>
				<div id = "NewsContainerBox" style='overflow-x:auto;'>
			<button class='open-button' onClick='openPostForm()' id = 'addpost'>Add Post</button>
					<div id='posts' name='posts'>
					</div>
					<!--<div id='post' style='height:80%;width:400px;align:left;border:solid;'>
					<h2>Title</h2>
					<p style='word-wrap: break-word;text-align:left;margin-left:1%;'>bodyaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
					</div>-->
						

					</div>
				
			</div>

			<!--Reviews-->
			<div id = "StandOwnerPosting">
				<div id = "StandPostingTitle"><h3>Reviews</h3></div>
				<div id = "StandPostingSubContainer">


					<div id = "StandPostingContent"><p>
						
					</p></div>
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
		
		var errors = 0;

		if (title.length > 50) {
			document.getElementById('posterror').innerHTML="Post title can not be longer than 50 characters";  
			error++;
		} 
		if (desc.length > 200) {			
			document.getElementById('posterror').innerHTML="Post description can not be longer than 200 characters";  
			error++;
		}


		if (title != "" && desc != "" && id != "" && error == 0) {
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

$(document).ready(function(e) {
	$("#editFarmform").on('submit', (function(e) {
		e.preventDefault();

		var title = document.getElementById("farmtitle").value;
		var desc = document.getElementById("farmdesc").value;

		//alert(title);
		//alert(desc);
		var error = 0;

		if(title.length < 10 || title.length > 30) {
			error++;
			document.getElementById('editfarmerror').innerHTML="Title must be between 10 and 30 characters";  

		}
		if(desc.length < 10 || desc.length > 100) {
			error++;
			document.getElementById('editfarmerror').innerHTML="Description must be between 10 and 100 characters";  
		}
		if(document.getElementById("uploadImage").value == "") {
			error++;
		}

		if(id != -1 && error == 0) {
		$.ajax({
			url: "updateFarmstandInfo.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				if (response==1) {
					$("#editFarmform")[0].reset();
					closeFarmForm();
					loadFarmInfo();
				} else {
					alert('Error editing info');
				}


			}


		});
		} else {
		}

	}));
});



function loadPage() {
loadPosts();
loadReviews();
loadProducts();
loadFarmInfo();
}

function loadReviews() {
	var fid = "<?php if(isset($_SESSION['farm_id'])) echo $_SESSION['farm_id']; else echo 0; ?>";
	if(fid != 0) {
		$.ajax({
			url: "getOwnerMarketReviews.php",
			type: "POST",
			data: {fid:fid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#result').html();
            		$('#StandPostingContent').html(result);						
			}
		});
	}
}


function loadFarmInfo() {
var id = "<?php echo $_SESSION['farm_id']; ?>";
if(id != 0) {
$.ajax({
		url: "farmstandInfo.php",
		type: "POST",
		data: {id:id},
		dataType: "html",
		success: function(data) {
		var result = $('<div />').append(data).find('#result').html();
            	$('#farminfo').html(result);						}
	});
} else {

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
            	$('#posts').html(result);						
		}
	});

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

function editFarmInfo() {
	openFarmForm();
	var id = "<?php if(isset($_SESSION['farm_id'])) echo $_SESSION['farm_id']; else echo -1; ?>";

	if (id != -1) {
		$.ajax({
			url: "editFarmData.php",
			type: "POST",
			data: {id:id},
			dataType: "JSON",
			success: function(data) {
				document.getElementById('farmtitle').value = data[0].title;
				document.getElementById('farmdesc').value = data[0].desc;
			}
		});

	} else {
		alert('You are not logged in');
	}
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

function openPostForm() {
  	document.getElementById("postForm").style.display = "block";
 	document.getElementById('addpost').style.display = "none";
	document.getElementById('posts').style.display = "none";
}

function closePostForm() {
  	document.getElementById("postForm").style.display = "none";
 	document.getElementById('addpost').style.display = "block";
	document.getElementById('posts').style.display = "block";
	$("#addpostform")[0].reset();

}

function openFarmForm() {
  	document.getElementById("farmForm").style.display = "block";
 	document.getElementById('editfarm').style.display = "none";
}

function closeFarmForm() {
	document.getElementById("farmForm").style.display = "none";
	document.getElementById('editfarm').style.display = "block";
	$("#editFarmform")[0].reset();
}




			
</script>


</body>
</html>
