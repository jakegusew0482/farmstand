
<?php

//Look for a user in the users table, if not found search the farmstand table

include('mysqli_connect.php');

$usertable          = "user";

$farmtable		= "farmstand";

if (isset($_POST['user'])) $user = $_POST['user'];
else $user = NULL; // Get user if set

if (isset($_POST['pass'])) $pass = $_POST['pass'];
else $pass = NULL; // Get pass if set

$found = false;
session_start();

if ($user != NULL && $pass != NULL) {

	$query = "SELECT * FROM $usertable WHERE username='$user' and password='$pass';";

	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result) > 0) { // If user found
		
		$_SESSION['username'] = $user;
		$_SESSION['account_type'] = "user";
		$_SESSION['user_id'] = $row['user_id'];
		echo 1;
		mysqli_close($connect);
		exit();
	} else {
		$query = "SELECT * FROM $farmtable WHERE username='$user' and password='$pass';";
		$result = mysqli_query($connect, $query);


		if (mysqli_num_rows($result) > 0) { // If user found
			
			$row = mysqli_fetch_assoc($result);
			$id = $row['farmstand_id'];
			$_SESSION['farm_id'] = $id;
			$_SESSION['username'] = $user;
			$_SESSION['account_type'] = "farmstand";
			$_SESSION['farmstand_name'] = $row['title'];
			$_SESSION['farmstand_description'] = $row['description'];
			$_SESSION['farmstand_address'] = $row['address'];
			$_SESSION['farmstand_image'] = $row['coverimage'];
			echo 1;
			mysqli_close($connect);
			exit();
		} else {
			echo 0;
		}
	}
}

mysqli_close($connect);

?>





