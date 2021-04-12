<?php
//Gets product data for the user market page

					include('mysqli_connect.php');
					
					if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;
				
					echo "<div id = 'result'>";

					echo "<p>$test</p>";
					if($id != NULL) {
						$query = "SELECT * FROM product WHERE farmstand_id = '$id' and removed = 0";

						$result = mysqli_query($connect, $query);

						
					
						while($row = mysqli_fetch_assoc($result)) {
							
							echo"<form id='productview' name='productview' method='post' action='addToCart.php'>";
							
							$name = $row['name'];
							$desc = $row['description'];
							$price = $row['price'];
							$image = $row['image'];

							include('config.php');
							$pid = $row['product_id'];
							$fid = $row['farmstand_id'];
							$uid = $_SESSION['user_id'];	
						
							echo"<input id='product_id' name='product_id' style='display:none;' value='$pid'>";

							echo"<input id='farmstand_id' name='farmstand_id' style='display:none;' value='$fid'>";

							echo"<input id='user_id' name='user_id' style='display:none;' value='$uid'>";


							
							echo"<div id = 'itemDisplayContainer'>";
							
							echo "<div id = 'ItemImage'><img src='$image' height='150' width='150'></div>
							<div id = 'ItemDescription'>	
							<div id = 'ItemName'><p>$name</p></div>
							<div id = 'ItemDescriptionBox'><p>$desc</p></div></div>
							<div id = 'SideInventoryIDContainer'>
							<div id = 'ItemQTY'><p id='price'>$$price / Unit</p></div>
							<div id = 'ItemPrice'><label for='quantity'>Quantity:</label><input type='number' id='quantity' name='quantity' value='1'></div>";

							include('config.php');
							if(isset($_SESSION['user_id'])) {
							echo "<input type='submit' class='btn' value='Add Item to Cart'>";
							} // onClick='addToCart($uid, $pid, $fid);'
						
							echo"</div></div>";
							echo"</form>";


						
						}
						

					} 
					echo "</div>";
				mysqli_close($connect);
				?>