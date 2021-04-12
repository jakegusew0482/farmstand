<?php
// Removes a product from a farmstand account
	include('mysqli_connect.php');
	
	if(isset($_POST['productid'])) $id = $_POST['productid']; else $id = NULL;

	if($id != NULL) {

		$query  = "update product set removed = 1 where product_id=$id;";

		//$query = "delete from product where product_id = '$id'";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);		
	} else {
		echo 0;
	}

mysqli_close($connect);

?>