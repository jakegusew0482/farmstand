<?php

	include('mysqli_connect.php');

	if(isset($_POST['cart_id'])) $id = $_POST['cart_id']; else $id = NULL;

	if($id != NULL) {

		$query = "delete from cart_item where id = $id";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);

	} else {
		echo 2;
	}
	mysqli_close($connect);
?>