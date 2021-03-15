<?php

	include('mysqli_connect.php');

	$table = "farmstand";

	if(isset($_POST['title'])) $title= $_POST['title']; else $title = NULL;
	if(isset($_POST['desc'])) $desc = $_POST['desc']; else $desc = NULL;
	if(isset($_POST['user'])) $user = $_POST['user']; else $user = NULL;
	if(isset($_POST['email'])) $email = $_POST['email']; else $email = NULL;
	if(isset($_POST['address'])) $address = $_POST['address']; else $address = NULL;
	if(isset($_POST['password'])) $password = $_POST['password']; else $password = NULL;


	if($title != NULL && $desc != NULL && $address != NULL && $user != NULL && $email != NULL) {
                
			$query = "INSERT INTO $table(username, email, title, description, address, password)  VALUES(?, ?, ?, ?, ?, ?);";
			$statement = mysqli_prepare($connect, $query);
			mysqli_stmt_bind_param($statement, 'ssssss', $user, $email, $title, $desc, $address, $password);
			mysqli_stmt_execute($statement);
			$count = mysqli_stmt_affected_rows($statement);
			if ($count > 0) {
				echo 1;
			}
			mysqli_stmt_close($statement);

			
			if(!(mysqli_insert_id($connect) == 0)) {
				include('config.php');
				$_SESSION['farm_id'] = mysqli_insert_id($connect);
				$_SESSION['username'] = $user;
				$_SESSION['account_type'] = "farmstand";
				$_SESSION['farmstand_name'] = $title;
				$_SESSION['farmstand_description'] = $desc;
				$_SESSION['farmstand_address'] =  $address;

			}			
	} else {
		echo 2;
	}
mysqli_close($connect);
?>

