<?php
include('mysqli_connect.php');

	if(isset($_POST['id'])) {

		$id = $_POST['id'];

		$query = "select * from farmstand where farmstand_id='$id'";

		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_assoc($result);

		
			
			$json[] = array('title' => $row['title'],
					'desc' => $row['description'],
					'id' => $row['farmstand_id']);
			
			echo json_encode($json);

		

	}


mysqli_close($connect);
?>