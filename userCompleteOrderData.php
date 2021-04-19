<?php
	include('mysqli_connect.php');
	
	if(isset($_POST['uid'])) $uid = $_POST['uid']; else $uid = NULL;
	
	if($uid != NULL) {

		// SELECT ALL THE ORDER FOR THIS FARMSTAND INCLUDING THE USERS INFORMATION WHO PLACED THE ORDER
		$query = "SELECT order_id, complete from user_order where user_id = $uid and complete = 1;";

		$result = mysqli_query($connect, $query);

		echo "<div id='completeresult'>";
	
		while($row = mysqli_fetch_assoc($result)) {

			echo"<div id='testorder'>";
			
			$orderID 	= $row['order_id'];
			$complete	= $row['complete'];

			$status = "Completed";
			// ECHO THE ORDER INFORMATION PANEL

			

				echo"<div id='orderInfo'>
						<p id='headerp'>STATUS: $status<br>ORDER ID: $orderID<br>PHONE: 631-123-4567</p>
				     </div>";

				
			// NOW SELECT ALL THE PRODUCT FOR EACH ORDER
			$query = "SELECT p.name, p.price, i.quantity from order_item i, product p where i.product_id = p.product_id and i.order_id = $orderID";

			$productresult = mysqli_query($connect, $query);
			// START OF PRODUCTS TABLE
			echo "<div id='orderItems'> 
				<div id='items'>
					<h2>ITEMS</h2>
					<table id='itemTable'>
						<tr>
							<th>Item Name</th>
							<th>Price</th>
							<th>Quantity</th>
						</tr>";

			
			$total = 0;

			while($productrow = mysqli_fetch_assoc($productresult)) {
				
				$name 		= $productrow['name'];
				$price		= $productrow['price'];
				$quantity	= $productrow['quantity'];

				$total += ($price * $quantity);

				echo "<tr> <td>$name</td> <td>$$price</td> <td>$quantity</td> </tr>";
				
			}

			echo"</table></div>"; // END OF PRODUCTS TABLE

			echo"<div id='total'>
				<p> TOTAL: $$total</p>
			     </div>";
			echo "</div>";
			echo "</div><br>";
			

		}

		echo "</div>";
	}

	mysqli_close($connect);
?>