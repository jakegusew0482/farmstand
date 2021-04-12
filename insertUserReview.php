<?php
// Add a user review to a farmstand given user id, farmstand id, rating, reviewtext
	include('mysqli_connect.php');

	if(isset($_POST['uid'])) 	$uid = $_POST['uid']; 			else $uid = NULL;
	if(isset($_POST['fid'])) 	$fid = $_POST['fid']; 			else $fid = NULL;
	if(isset($_POST['rating']))	$rating = $_POST['rating'];		else $rating = NULL;
	if(isset($_POST['reviewtext'])) $reviewtext = $_POST['reviewtext']; 	else $reviewtext = NULL;

	if($uid != NULL && $fid != NULL && $rating != NULL && $reviewtext != NULL) {
		
		$query = "INSERT INTO review(farmstand_id, user_id, rating, review_text) values(?,?,?,?);";

		$statement = mysqli_prepare($connect, $query);
	
		mysqli_stmt_bind_param($statement, 'iiis', $fid, $uid, $rating, $reviewtext);

		mysqli_stmt_execute($statement);

		echo mysqli_stmt_affected_rows($statement);

		mysqli_stmt_close($statement);
	}

	mysqli_close($connect);
?>