<?php
//Retrieves items in a users cart given the users ID and the farmstands ID.

	include('mysqli_connect.php');

	if(isset($_POST['farmstand_id'])) $fid = $_POST['farmstand_id']; else $fid = NULL;
	if(isset($_POST['user_id'])) $uid = $_POST['user_id']; else $uid = NULL;

	echo"<div id='result' name='result'>";
	echo "<h3>Your Cart</h3>";
	echo"<div id = 'InventoryReservationContainer' >";

	
	if($uid != NULL && $fid != NULL) {
		$query = "select ci.id, ci.product_id, ci.farmstand_id, ci.quantity, p.name, p.price from cart_item as ci inner join product as p on ci.product_id = p.product_id where ci.user_id = '$uid' and ci.farmstand_id = '$fid';";
		
		$result = mysqli_query($connect, $query);

		while($row = mysqli_fetch_assoc($result)) {
			$name = $row['name'];
			$quantity = $row['quantity'];
			$id = $row['id'];
			$price = $row['price'] * $quantity;

			echo "<p><h4>$name</h4><span class='price'>$$price <br> QTY: $quantity</span></p>";
			echo "<input type='button' onClick='removeFromCart($id);' value='Remove'>";
		}
	}

	echo"<hr>";
	echo "</div></div></div>";

	mysqli_close($connect);
?>

