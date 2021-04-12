<?php
// Updates farmstand information with new data
	include('mysqli_connect.php');	
	include('functions.php');

	$valid_extensions = array('jpeg', 'jpg', 'png');
	$path = 'uploads/';

	if(isset($_POST['farmtitle'])) $title = $_POST['farmtitle']; else $title = NULL;
	if(isset($_POST['farmdesc'])) $desc = $_POST['farmdesc']; else $desc = NULL;
	if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;

	if($id != NULL) {
		
		$query = "update farmstand set title = '$title', description = '$desc',";

		if ($_FILES['image']) {
			$img = $_FILES['image']['name'];
			$tmp = $_FILES['image']['tmp_name'];
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			$final_image = rand(1000,1000000).$img;
			if(in_array($ext, $valid_extensions)) {
				$path = $path.strtolower($final_image); 
				if(move_uploaded_file($tmp,$path)) {
					removeFile($id);
					$query .= "coverImage = '$path'";
				}

			}
		}
		$query .= " where farmstand_id='$id'";
		$result = mysqli_query($connect, $query);

		echo mysqli_affected_rows($connect);
		
	}

	mysqli_close($connect);
?>

