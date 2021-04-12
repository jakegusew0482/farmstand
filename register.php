<?php
// Registers a user into the database
	include('mysqli_connect.php');

	$table = "user";
	$defaultName = "default name";

	if(isset($_POST['user'])) $user = $_POST['user']; else $user = NULL;
	if(isset($_POST['pass'])) $pass = $_POST['pass']; else $pass = NULL;
	if(isset($_POST['email'])) $email = $_POST['email']; else $email = NULL;

	if($user != NULL && $pass != NULL && $email != NULL) {

		$query =  "SELECT username, email FROM $table WHERE username = '$user' or email = '$email';";

		$result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) == 0) { // If no user found
                
			$query = "INSERT INTO $table(username, name, email, password)  VALUES(?, ?, ?, ?);";
			$statement = mysqli_prepare($connect, $query);
			mysqli_stmt_bind_param($statement, 'ssss', $user, $defaultName, $email, $pass);
			mysqli_stmt_execute($statement);
			$count = mysqli_stmt_affected_rows($statement);
			echo $count;
			mysqli_stmt_close($statement);

			include('config.php');
			$_SESSION['username'] = $user;
			$_SESSION['account_type'] = 'user';
			$_SESSION['user_id'] = mysqli_insert_id($connect);

		} else {
			echo 2;
		}
	} else {
		echo 3;
	}
mysqli_close($connect);
