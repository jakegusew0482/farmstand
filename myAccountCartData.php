<?php
	//Retreieves all of the users cart items 

	include('mysqli_connect.php');

	if(isset($_POST['id'])) {

		$id = $_POST['id']; 
	
		$query = " select  p.name, p.price, f.title, c.quantity, c.id from cart_item c, product p, farmstand f where c.product_id = p.product_id and c.farmstand_id = f.farmstand_id and c.user_id = $id order by f.title;";

		//$query = "select f.title, c.farmstand_id from cart_item c, farmstand f where c.farmstand_id = f.farmstand_id and c.user_id = $id";

		$result = mysqli_query($connect, $query);
	
		echo "<div id='result'>";
		if($row = mysqli_fetch_assoc($result)) {
			
			$currentFarmstand = $row['title'];
			$product = $row['name'];
			$price = $row['price'];
			$cartID = $row['id'];
			$qty = $row['quantity'];
			$total = 0;
			$total += $qty * $price;

			echo "<h3> Cart for $currentFarmstand </h3>";
			echo "<p> $product - <span class='price'>$$price - </span><span class='price'>QTY: $qty  </span><input type='button' onclick='removeFromCart($cartID);' value='Remove'></p>";
			while($row = mysqli_fetch_assoc($result)) {
				
				$nextFarmstand = $row['title'];
				if($nextFarmstand != $currentFarmstand) {
					
					echo "<p>Total: $$total</p><br>";
					echo"<hr style='border: 1px solid lightgrey;'>";
					echo"<h3> Cart for $nextFarmstand</h3>";
					$currentFarmstand = $nextFarmstand;
					$total = 0;
				}

				$product = $row['name'];
				$price = $row['price'];
				$cartID = $row['id'];
				$qty = $row['quantity'];
				$total += $qty * $price;
				
				echo "<p> $product - <span class='price'>$$price - </span><span class='price'>QTY: $qty  </span><input type='button' onclick='removeFromCart($cartID);' value='Remove'></p>";
			}
			echo "<p>Total: $$total</p>";

		}
		echo "</div>";
	}

	mysqli_close($connect);
?>