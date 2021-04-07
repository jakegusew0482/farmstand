<?php

	include('mysqli_connect.php');
	
	if(isset($_POST['user_id'])) $uid = $_POST['user_id']; else $uid = NULL;
	if(isset($_POST['product_id'])) $pid = $_POST['product_id']; else $pid = NULL;
	if(isset($_POST['farmstand_id'])) $fid = $_POST['farmstand_id']; else $fid = NULL;

	if($uid != NULL && $pid != NULL && $fid != NULL) {
		$query = "insert into cart_item(user_id, product_id, farmstand_id, quantity) values($uid, $pid, $fid, 1)";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);
		echo mysqli_error($connect);
	} else {
		echo 2;
	}


	mysqli_close($connect);
?>