<?php
//Destroys session
	include('config.php');
	
	session_destroy();
	header("Refresh:0; url=index.php");


?>
