<?php

					include('mysqli_connect.php');
					
					if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;
				
					echo "<div id = 'result'>";

					echo "<p>$test</p>";
					if($id != NULL) {
						$query = "SELECT * FROM product WHERE farmstand_id = '$id';";

						$result = mysqli_query($connect, $query);

						
					
						while($row = mysqli_fetch_assoc($result)) {
							$name = $row['name'];
							$desc = $row['description'];
							$price = $row['price'];
							$image = $row['image'];

							include('config.php');
							$pid = $row['product_id'];
							$fid = $row['farmstand_id'];
							$uid = $_SESSION['user_id'];
							

							
							echo"<div id = 'itemDisplayContainer'>";
							
							echo "<div id = 'ItemImage'><img src='$image' height='150' width='150'></div>
							<div id = 'ItemDescription'>	
							<div id = 'ItemName'><p>$name</p></div>
							<div id = 'ItemDescriptionBox'><p>$desc</p></div></div>
							<div id = 'SideInventoryIDContainer'>
							<div id = 'ItemQTY'></div>
							<div id = 'ItemPrice'><p>$price $</p></div>";

							include('config.php');
							if(isset($_SESSION['user_id'])) {
							echo "<button id = 'AddToCart' onClick='addToCart($uid, $pid, $fid);'>Add Item to Cart</button>";
							}
						
							echo"</div></div>";


						
						}
						

					} 
					echo "</div>";
				mysqli_close($connect);
				?>