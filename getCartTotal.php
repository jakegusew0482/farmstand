<?php
function getTotal($fid, $uid) {
	include('mysqli_connect.php');

	$query = "select ci.id, ci.product_id, ci.farmstand_id, ci.quantity, p.name, p.price from cart_item as ci inner join product as p on ci.product_id = p.product_id where ci.user_id = '$uid' and ci.farmstand_id = '$fid';";

	$result = mysqli_query($connect, $query);

	$total = 0;

	// Values for itemsKeys
	while($row = mysqli_fetch_assoc($result)) {
		$quantity = $row['quantity'];
		$price = $row['price'];

		$total += ($quantity * $price);
	
	}	

	return $total;

	mysqli_close($connect);
}
?>