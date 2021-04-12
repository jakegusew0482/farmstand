<?php
// Removes a users review
	include('mysqli_connect.php');

	if(isset($_POST['rid'])) {
		$rid = $_POST['rid'];
		
		$query = "DELETE FROM review WHERE review_id = $rid";

		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);
	}

	mysqli_close($connect);
?>