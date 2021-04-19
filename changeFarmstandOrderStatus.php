<?php

	include('mysqli_connect.php');

	if(isset($_POST['order_id'])) $oid = $_POST['order_id']; else $oid = NULL;
	if(isset($_POST['method'])) $method = $_POST['method']; else $method = NULL;

	if($oid != NULL && $method != NULL) {
	
		$query = "UPDATE user_order SET";	
	
		if($method == 1) {
			$query .= " ready = 1";
		} else if ($method == 2) {
			$query .= " complete = 1";
		}

		$query .= " WHERE order_id = $oid";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);
	}

	mysqli_close($connect);
?>