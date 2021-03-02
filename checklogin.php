<?php

	include('config.php');

	if(isset($_SESSION['username']))  {
		echo 1;
	} else {
		echo 0;
	}
?>
