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
					echo "</div>";
				mysqli_close($connect);
				?>