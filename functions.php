<?php

	function removeFile($farmstandID) {
		
		$query = "select coverImage from farmstand where farmstand_id = $farmstandID";

		include('mysqli_connect');

		$result = mysqli_query($connect, $query);

		$row = mysqli_fetch_assoc($result);

		$img = $row['coverImage'];

		if(file_exists($img)) {

			unlink($img);
		
		}
		mysqli_close($connect);
	}


?>