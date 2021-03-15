<?php

	include('mysqli_connect.php');

	$table = "product";

	if(isset($_POST['name'])) $name = $_POST['name']; else $name = NULL;
	if(isset($_POST['desc'])) $desc = $_POST['desc']; else $desc = NULL;
	if(isset($_POST['price'])) $price = $_POST['price']; else $price = NULL;
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;

	if($name != NULL && $desc != NULL && $price != NULL && $id != NULL) {

		$query = "INSERT INTO $table(farmstand_id, name, description, price) VALUES(?,?,?,?);";
		$statement = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($statement, 'issi', $id, $name, $desc, $price);
		mysqli_stmt_execute($statement);
		$count = mysqli_stmt_affected_rows($statement);
		echo $count;
		mysqli_stmt_close($statement);

	} else {
		echo 2;
	}
mysqli_close($connect);
?>



