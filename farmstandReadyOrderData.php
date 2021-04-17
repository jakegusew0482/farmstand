<?php
	include('mysqli_connect.php');
	
	if(isset($_POST['fid'])) $fid = $_POST['fid']; else $fid = NULL;
	
	if($fid != NULL) {

		// SELECT ALL THE ORDER FOR THIS FARMSTAND INCLUDING THE USERS INFORMATION WHO PLACED THE ORDER
		$query = "SELECT u.username, o.order_id, o.user_id, o.paid, o.ready, o.complete from user_order o, user u where o.farmstand_id = $fid and o.user_id = u.user_id and o.ready = 1 and o.complete = 0;";

		$result = mysqli_query($connect, $query);

		echo "<div id='readyresult'>";
	
		while($row = mysqli_fetch_assoc($result)) {

			echo"<div id='testorder'>";
			
			$orderID 	= $row['order_id'];
			$username 	= $row['username'];
			$user_id 	= $row['user_id'];
			$paid 		= $row['paid'];
			$ready		= $row['ready'];
			$complete	= $row['complete'];

			if($ready == 1) $status = 'ready'; else $status = 'incomplete';
			if($complete == 1) $status = 'complete';

			// ECHO THE ORDER INFORMATION PANEL

			

				echo"<div id='orderInfo'>
						<p id='headerp'>STATUS: $status<br>ORDER ID: $orderID<br>CUSTOMER NAME: $username<br>PHONE: 631-123-4567</p>
							<div id='orderButtons'>
								<button type='button' onclick='markOrderReady($orderID)'>Mark Ready</button>
								<button type='button' onclick='markOrderComplete($orderID)'>Mark Complete</button>
							</div>
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
