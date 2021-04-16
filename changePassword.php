<?php
	include('mysqli_connect.php');

	if(isset($_POST['currentPassword'])) $currentPassword = $_POST['currentPassword']; else $currentPassword = NULL;
	if(isset($_POST['newPassword'])) $newPassword = $_POST['newPassword']; else $newPassword = NULL;
	if(isset($_POST['uid'])) $uid = $_POST['uid']; else $uid = NULL;

	if($currentPassword != NULL && $newPassword != NULL && $uid != NULL) {

		$query = "SELECT user_id FROM user WHERE user_id = $uid and password = '$currentPassword'";
		$result = mysqli_query($connect, $query);
		if(mysqli_affected_rows($connect) > 0) {
			
			$query = "UPDATE user SET password = '$newPassword' WHERE user_id = $uid";
			$result = mysqli_query($connect, $query);
			echo mysqli_affected_rows($connect);
		} else {
			echo 2;
			mysqli_close($connect);
			exit();
		}
	}
	
	mysqli_close($connect);
?>