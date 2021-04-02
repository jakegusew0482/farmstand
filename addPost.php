<?php

	include('mysqli_connect.php');

	if(isset($_POST['title'])) $title = $_POST['title']; else $title = NULL;
	if(isset($_POST['desc'])) $desc = $_POST['desc']; else $desc = NULL;
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;

	if($title != NULL && $desc != NULL && $id != NULL) {
		$query = "insert into news(farmstand_id, title, description) values($id, '$title', '$desc');";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);	
	} else {
		echo 2;
	}

	mysqli_close($connect);
?>