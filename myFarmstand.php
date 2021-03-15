<?php 
	include('navbar.php'); 

	if(!(isset($_SESSION['username'])) || $_SESSION['account_type'] != "farmstand") {
		echo "<h1>You must be logged into a farmstand account to view this page</h1>";
	} else {
		include('mysqli_connect.php');

		$id = $_SESSION['farm_id'];
		$table = farmstand;
		
		$query = "SELECT * FROM $table WHERE farmstand_id = $id";

		$result = mysqli_query($connect, $query);

		$row = mysqli_fetch_assoc($result);

		echo '<h1>Title: ' . $row["title"] . '</h1>';
		echo '<h2>Description: ' . $row["description"] . '</h1>';
		echo '<h3>username: ' . $row["username"] . '</h1>';
		echo '<h3>address: ' . $row["address"] . '</h1>';

		$query = "SELECT * FROM product WHERE farmstand_id = $id";
		mysqli_close($connect);
		include('mysqli_connect.php');
		$result = mysqli_query($connect, $query);

		$num = mysqli_num_rows($result);

		for($i = 0; $i < $num; $i++) {
			$row = mysqli_fetch_assoc($result);
			
			echo '<h3>product: ' . $row["name"] . '</h1>';
		}

	}

?>




