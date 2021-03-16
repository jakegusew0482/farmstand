<?php include('navbar.php'); ?>
	<div class="main">
		<div id= "marketPlaceContainer">
			<div id="MarketNodeContainer">
			
				<!--Main Container-->
				<!--Text input from previous pages should be locked in div id containers-->
				<div class="UserStandContainer">
					
					<?php 
					include('config.php');
					$name = $_SESSION['farmstand_name'];
					$desc = $_SESSION['farmstand_description'];
					$address = $_SESSION['farmstand_address'];
					$imgsrc = $_SESSION['farmstand_image'];
					echo"<div id = 'ImageContainer'>
					<img src='$imgsrc' id ='FarmStandImage' style='width:100%'> 
					</div>
					<div id = 'StandNameContainer'>

					";
					echo "<h1 id = 'StandNamePass'> $name  </h1> 
					</div>
					<div id = 'DescriptionContainer'>
					<p id ='StandDescriptionPass'>$desc</p>
					</div>
					<div id = 'AddressContainer'>
					<p id = 'StandAddressPass'>$address</p>
					</div>"; ?>
					
					
					
					
					
					
					<p>
						<button onclick="document.getElementById('AddItemsButton').style.display='block'">Add Items</button>
					</p>
	</div>
		</div>
			</div>
				</div>		
				
				
	<!--
		Modal Window for adding inventory
	-->			
	
	

	<div id="AddItemsButton" class="modal">
		<span onclick="document.getElementById('AddItemsButton').style.display='none'" class="close" title="Close Modal"></span>
		<div class="modal-content">
		<div class="container">
			<h1>Add new inventory</h1>
			
			<div class="UserInventoryAdd">
				<form id='productform' name='productform' method='post' action='addProduct.php' enctype='multipart/form-data'>

					<label for="name">Item Name</label><br>
					<input type="text" id="name" name="name" placeholder="New Item"><br>
					<label for="desc">Item Description</label><br>
					<input type="text" id="desc" name="desc" placeholder="Item Description"><br>

						<p>Inventory Images</p>
						<div class="panel">
							
							<label for="files">Select file:</label>
							<input id="uploadImage" type="file" accept="image/*" name="image"/><br><br>
							
						</div>
						<div id = "QTYandPrice">							
								<label for="quantity">Price:</label>
								<input type="number" id="price" name="price" >
						</div>
						<p id='test'>test</p>
							<?php $id = $_SESSION['farm_id'];
						echo "<input style='display:none;' id='id' name = 'id' value='$id'>"; ?>
						</div>
						<br>
					<br>
					

					<input class="btn btn-success" type="submit" value="Add Item">

					</form>


					<div class="clear">
						<button type="button" onclick="document.getElementById('AddItemsButton').style.display='none'" class="cancelbtn">Cancel</button>
					</div>
			</div>

	</body>
</html>

					
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>					
<script>


	$(document).ready(function(e) {
	 $("#productform").on('submit',(function(e) {
	  e.preventDefault();
					
		$.ajax({
         		url: "addProduct.php",
  			type: "POST",
   			data:  new FormData(this),
   			contentType: false,
       			cache: false,
  			processData:false,
   			success: function(data) {
     				$("#productform")[0].reset(); 
			}
    		});
 	}));
});



						function CreateNewLine()
						{
							var divElement = document.createElement("DIV");
							var t = document.createTextNode("This is a div element.");
							divElement.setAttribute("style", "background-color: pink;");
							divElement.appendChild(t);
							document.body.appendChild(divElement);
								

						}
					</script>



				</form> 

			</div>



















			


























