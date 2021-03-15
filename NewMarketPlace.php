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
				
					<label for="invItem">Item Name</label><br>
					<input type="text" id="invItem" name="invItem" placeholder="New Item"><br>
					<label for="invItemDesc">Item Description</label><br>
					<input type="text" id="invItemDesc" name="invItemDesc" placeholder="Item Description"><br>

						<p>Inventory Images</p>
						<div class="panel">
							<form action="/action_page.php">
							<label for="files">Select files:</label>
							<input type="file" id="files" name="files" multiple><br><br>
							
						</div>
						<div id = "QTYandPrice">							
								<label for="quantity">Quantity (minimum of 1):</label>
								<input type="number" id="quantity" name="quantity" min="1" max="none">

								<label for="quantity">Price:</label>
								<input type="number" id="Price" name="Price" >
						</div>
						<p id='test'>test</p>
							<?php $id = $_SESSION['farm_id'];
						echo "<p style='display:none;' id='farmid'>$id</p>"; ?>
						</div>
						<br>
					<br>
					

					<button type='button' name='add' id='add'>Add New Item</button>
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
					<script language='JavaScript' type='text/javascript'>


						$(document).ready(function() {
						$("#add").on('click',function() {
							var name = $('#invItem').val();
							var desc = $('#invItemDesc').val();
							var price = $('#Price').val();
							var id = document.getElementById("farmid").innerHTML;

					
							if(name != "" && desc != "" && price != "") {
							

								$.ajax({
									url:'/addProduct.php',
									type:'post',
									data:{name:name, desc:desc, price:price, id:id},
									success:function(response) {
									if(response==1) {
										document.getElementById('test').innerHTML = "Item Added";
										document.getElementById('invItem').value = "";
										document.getElementById('invItemDesc').value = "";
										document.getElementById('Price').value = "";			
									} else if(response==2) {
										
									}
										

									}
							});
							} else {
								document.getElementById('test').innerHTML = "Please fill out each field";
							}
							});
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



















			



























					<div class="clear">
						<button type="button" onclick="document.getElementById('AddItemsButton').style.display='none'" class="cancelbtn">Cancel</button>
					</div>
			</div>







	


</body>
</html>
