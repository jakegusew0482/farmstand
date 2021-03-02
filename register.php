<?php

	include('mysqli_connect.php');

	$table = "user";
	$defaultName = "default name";

	if(isset($_POST['user'])) $user = $_POST['user']; else $user = NULL;
	if(isset($_POST['pass'])) $pass = $_POST['pass']; else $pass = NULL;
	if(isset($_POST['email'])) $email = $_POST['email']; else $email = NULL;

	if($user != NULL && $pass != NULL && $email != NULL) {

		$query = "INSERT INTO $table(username, name, email, password)  VALUES('$user', '$defaultName', '$email', '$pass');";
/*DISABLED	if(mysqli_query($connect, $query)){
		
			
			echo 1;
		} else {
		
			echo 0;
	} DISABLED*/		
	}
	echo 0;
mysqli_close($connect);
?>

