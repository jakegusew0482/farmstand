<?php
	include('mysqli_connect.php');
					
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;

	if($id != NULL) {
		$query = "SELECT title, description, coverimage FROM farmstand WHERE farmstand_id = '$id';";
						
		$result = mysqli_query($connect, $query);

		$row = mysqli_fetch_assoc($result);

		$title = $row['title'];
		$desc = $row['description'];
		$image = $row['coverimage'];

		echo "<div id='result'>";
				
		echo "<div id = 'FarmStandName'><h2>$title</h2></div>
		<div id = 'FarmStandImage'><img src='$image' height='100%' width='100%'></div>
		<div id = 'FarmStandAddr'><h5>$desc</h5></div>";

		echo "</div>";
	}
					

	mysqli_close($connect);
?>