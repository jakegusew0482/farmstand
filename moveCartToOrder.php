<?php

	include('mysqli_connect.php');

	if(isset($_POST['farmstand_id'])) $fid = $_POST['farmstand_id']; else $fid = NULL;
	if(isset($_POST['user_id'])) $uid = $_POST['user_id']; else $uid = NULL;
	if(isset($_POST['paid'])) $paid = $_POST['paid']; else $paid = NULL;	// 0 or 1 depending on if user paid online or wants to pay in store

	$createOrderQuery = "INSERT INTO user_order(farmstand_id, user_id, paid, ready, complete) VALUES($fid, $uid, $paid, 0,0)"; // Create the order
	$query = "SELECT * FROM cart_item WHERE user_id = $uid AND farmstand_id = $fid"; // Get the items for the order // Get cart items
	$removeCartItems = "DELETE FROM cart_item WHERE user_id = $uid AND farmstand_id = $fid";

	if($uid != NULL && $fid != NULL && $paid != NULL) {
				
		$insertResult = mysqli_query($connect, $createOrderQuery); // Create order

		$orderid = mysqli_insert_id($connect); // Get ID of order row which was just inserted

		$result = mysqli_query($connect, $query); // Get cart items

		while($row = mysqli_fetch_assoc($result)){ // Loop through cart items
			
			$productid = $row['product_id'];
			$quantity = $row['quantity'];
			
			$insertOrderItem = "INSERT INTO order_item(order_id, product_id, quantity) values($orderid, $productid, $quantity)";

			$itemResult = mysqli_query($connect, $insertOrderItem); // Add the items to the order_items table
		}

		$removeresult = mysqli_query($connect, $removeCartItems); // Remove the items from the cart
	}

	mysqli_close($connect);
?>