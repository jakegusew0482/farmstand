<?php
// Add a product given the product name desc price file and farmstands ID

	include('mysqli_connect.php');

	$table = "product";
	$valid_extensions = array('jpeg', 'jpg', 'png');
	$path = 'uploads/';

	if(isset($_POST['name'])) $name = $_POST['name']; else $name = NULL;
	if(isset($_POST['desc'])) $desc = $_POST['desc']; else $desc = NULL;
	if(isset($_POST['price'])) $price = $_POST['price']; else $price = NULL;
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;

	if($name != NULL && $desc != NULL && $price != NULL && $id != NULL && $_FILES['image']) {

		$img = $_FILES['image']['name'];			//Get the image file, make a new random name for it
		$tmp = $_FILES['image']['tmp_name'];
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		$final_image = rand(1000,1000000).$img;

		if(in_array($ext, $valid_extensions)) { 		// Check file meets our upload requirements

			$path = $path.strtolower($final_image); 	// final path
	
			if(move_uploaded_file($tmp,$path)) {		// Move Image

				$query = "INSERT INTO $table(farmstand_id, name, description, price, image) VALUES(?,?,?,?,?);";
				$statement = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($statement, 'issis', $id, $name, $desc, $price, $path);
				mysqli_stmt_execute($statement);
				$count = mysqli_stmt_affected_rows($statement);
				echo $count;
				mysqli_stmt_close($statement);
			}
		}

	} else {
		echo 2;
	}

	mysqli_close($connect);
?>



