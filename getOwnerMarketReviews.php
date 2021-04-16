<?php
// Review star input section borrowed from https://www.cssscript.com/simple-5-star-rating-system-with-css-and-html-radios/
// Review star icon made by https://fontawesome.com/
	
	if(isset($_POST['fid'])) $fid = $_POST['fid']; else $fid = NULL;

	if($fid != NULL) {

		echo "<div id='result'>";
		


		include('mysqli_connect.php');
		$query = "SELECT r.rating, r.review_text, u.username FROM review r, user u WHERE r.user_id = u.user_id and farmstand_id = $fid";

		$result = mysqli_query($connect, $query);

		while($row = mysqli_fetch_assoc($result)) {

			$user = $row['username'];
			$rating = $row['rating'];
			$text = $row['review_text'];

			echo "<h3>$user</h3>";
			echo "<div class='stars' style='width:100%;'>";

			for ($i = 0; $i < $rating; $i++) {
				echo "<i class='fas fa-star'></i>";
			}
			for ($j = 0; $j < 5 - $rating; $j++) {
				echo "<i class='far fa-star'></i>";
			}
			echo "</div>";

			echo "<p>$text</p><hr>";
		}
		echo "</div>";
	}

	mysqli_close($connect);
?>