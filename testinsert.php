<?php
	include('mysqli_connect.php');

	$field = $_POST['field'];
	$id = $_POST['id'];
	
	$result = mysqli_query($connect, "insert into test(data, fid) values('$field', $id)");

	mysqli_close($connect);
?>