<?php

	include('mysqli_connect.php');

	if(isset($_POST['name'])) $name = $_POST['name']; else $name = NULL;
	if(isset($_POST['desc'])) $desc = $_POST['desc']; else $desc = NULL;
	if(isset($_POST['price'])) $price = $_POST['price']; else $price = NULL;
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;


	if($name != NULL && $desc != NULL && $price != NULL && $id != NULL) {

		$query = "update product set name = '$name', description = '$desc', price = '$price' where product_id = '$id'";

		$result = mysqli_query($connect, $query);

		$count = mysqli_affected_rows($connect);

		echo $count;

	} else {
		echo 0;
	}

mysqli_close($connect);
?>
