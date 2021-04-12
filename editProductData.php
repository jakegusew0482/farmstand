
<?php
//Retrieves data to populate the edit product form
	include('mysqli_connect.php');

	if(isset($_POST['id'])) {

		$id = $_POST['id'];

		$query = "select * from product where product_id='$id'";

		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_assoc($result);

		
			
			$json[] = array('name' => $row['name'],
					'desc' => $row['description'],
					'price' => $row['price'],
					'id' => $row['product_id']);
			
			echo json_encode($json);

		

	}


mysqli_close($connect);
?>