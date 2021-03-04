<?php

	include('mysqli_connect.php');

	$table = "user";
	$defaultName = "default name";

	if(isset($_POST['user'])) $user = $_POST['user']; else $user = NULL;
	if(isset($_POST['pass'])) $pass = $_POST['pass']; else $pass = NULL;
	if(isset($_POST['email'])) $email = $_POST['email']; else $email = NULL;

	if($user != NULL && $pass != NULL && $email != NULL) {

		$query = "INSERT INTO $table(username, name, email, password)  VALUES(?, ?, ?, ?);";
		$statement = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($statement, 'ssss', $user, $defaultName, $email, $pass);
		mysqli_stmt_execute($statement);
		$count = mysqli_stmt_affected_rows($statement);
		echo $count;
		mysqli_stmt_close($statement);
	} else {
		echo 0;
	}
mysqli_close($connect);
?>

