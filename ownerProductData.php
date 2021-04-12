<?php
//Retrieves all product data for the farmstand owner market page

	include('mysqli_connect.php');
					
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;
				
	echo "<div id = 'result'>";

	if($id != NULL) {
		$query = "SELECT * FROM product WHERE farmstand_id = '$id' and removed = 0;";

		$result = mysqli_query($connect, $query);

						
					
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row['name'];
			$desc = $row['description'];
			$price = $row['price'];
			$image = $row['image'];
			$id = $row['product_id'];
							

							
			echo"<div id = 'itemDisplayContainer'>";
							
			echo "<div id = 'ItemImage'><img src='$image' height='150' width='150'></div>
			<div id = 'ItemDescription'>	
			<div id = 'ItemName'><p>$name</p></div>
			<div id = 'ItemDescriptionBox'><p>$desc</p></div></div>
			<div id = 'SideInventoryIDContainer'>
			<div id = 'ItemPrice'><p>$price $</p></div>
			<button id = 'ItemEdit' onClick='editItem($id)'>Edit Product</button>
			<button id = 'ItemRemove' onClick='remove($id)'>Remove Product</button>
			</div>

			"; 
			echo"</div>";
						
		}
						

	} 
	echo "</div>";
	mysqli_close($connect);
?>