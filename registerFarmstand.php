<?php

	include('mysqli_connect.php');

	$table = "farmstand";
	$valid_extensions = array('jpeg', 'jpg', 'png');
	$path = 'uploads/';

	if(isset($_POST['title'])) $title= $_POST['title']; else $title = NULL;
	if(isset($_POST['desc'])) $desc = $_POST['desc']; else $desc = NULL;
	if(isset($_POST['user'])) $user = $_POST['user']; else $user = NULL;
	if(isset($_POST['email'])) $email = $_POST['email']; else $email = NULL;
	if(isset($_POST['address'])) $address = $_POST['address']; else $address = NULL;
	if(isset($_POST['password'])) $password = $_POST['password']; else $password = NULL;


	if($title != NULL && $desc != NULL && $address != NULL && $user != NULL && $email != NULL && $_FILES['image']) {
                
			$img = $_FILES['image']['name'];
			$tmp = $_FILES['image']['tmp_name'];
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			$final_image = rand(1000,1000000).$img;
			if(in_array($ext, $valid_extensions)) 
				{ 
					$path = $path.strtolower($final_image); 
					if(move_uploaded_file($tmp,$path)) 
					{

			

						$query = "INSERT INTO $table(username, email, title, description, address, password, coverimage)  VALUES(?, ?, ?, ?, ?, ?, ?);";
						$statement = mysqli_prepare($connect, $query);
						mysqli_stmt_bind_param($statement, 'sssssss', $user, $email, $title, $desc, $address, $password, $path);
						mysqli_stmt_execute($statement);
						$count = mysqli_stmt_affected_rows($statement);
						if ($count > 0) {
							echo 1;
						if(!(mysqli_insert_id($connect) == 0)) {
							include('config.php');
							$_SESSION['farm_id'] = mysqli_insert_id($connect);
							$_SESSION['username'] = $user;
							$_SESSION['account_type'] = "farmstand";
							$_SESSION['farmstand_name'] = $title;
							$_SESSION['farmstand_description'] = $desc;
							$_SESSION['farmstand_address'] =  $address;
							$_SESSION['farmstand_image'] = $path;
						}
						mysqli_stmt_close($statement);
					} else { 
					echo 3; 	
					}
				}
			}			
	} else {
		echo 2;
	}
mysqli_close($connect);
?>

