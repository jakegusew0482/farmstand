<?php

	include('mysqli_connect.php');
	
	if(isset($_POST['postid'])) $id = $_POST['postid']; else $id = NULL;

	if($id != NULL) {

		$query = "delete from news where post_id = '$id'";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);		
	} else {
		echo 0;
	}

mysqli_close($connect);

?>