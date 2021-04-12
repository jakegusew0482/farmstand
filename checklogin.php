<?php
// Check if a user is logged in

	include('config.php');

	if(isset($_SESSION['username']))  {
		echo 1;
	} else {
		echo 0;
	}
?>
