<?php
// Add a item to a users cart given the user id, farmstand id, and product id.
	include('mysqli_connect.php');
	
	if(isset($_POST['user_id'])) $uid = $_POST['user_id']; else $uid = NULL;
	if(isset($_POST['product_id'])) $pid = $_POST['product_id']; else $pid = NULL;
	if(isset($_POST['farmstand_id'])) $fid = $_POST['farmstand_id']; else $fid = NULL;
	if(isset($_POST['quantity'])) $qty = $_POST['quantity']; else $qty = NULL;

	if($uid != NULL && $pid != NULL && $fid != NULL) {

		$query = "select * from cart_item where user_id = $uid and product_id = $pid and farmstand_id = $fid;";

		$result = mysqli_query($connect, $query);

		if(mysqli_affected_rows($connect) == 1) { // If the item is already in cart just add the desired quantity to the existing quantity 

			$row = mysqli_fetch_assoc($result);

			$curquantity = $row['quantity'];
			$qty += $curquantity;
			$rowid = $row['id'];

			$query = "update cart_item set quantity = $qty where id = $rowid";

			$result = mysqli_query($connect, $query);

			echo mysqli_affected_rows($connect);
		} else {

			$query = "insert into cart_item(user_id, product_id, farmstand_id, quantity) values($uid, $pid, $fid, $qty)";

			$result = mysqli_query($connect, $query);

			echo mysqli_affected_rows($connect);
			echo mysqli_error($connect);
	
		}
	} else {
		echo 2;
	}


	mysqli_close($connect);
	header("Location: userMarketPage.php?id=$fid"); //Refresh page

?>