<?php
// Review star input section borrowed from https://www.cssscript.com/simple-5-star-rating-system-with-css-and-html-radios/
// Review star icon made by https://fontawesome.com/

	include('navbar.php');
	

	if(isset($_POST['loggedin'])) $login = $_POST['loggedin']; else $login = 0;
	if(isset($_POST['uid'])) $uid = $_POST['uid']; else $uid = NULL;
	if(isset($_POST['fid'])) $fid = $_POST['fid']; else $fid = NULL;

	if($fid != NULL) {

		echo "<div id='result'>";
		
		if($login == 1) {
			include('mysqli_connect.php');
			$query = "SELECT review_id, rating, review_text FROM review where user_id = $uid and farmstand_id = $fid;";
			$result = mysqli_query($connect, $query);

			if (mysqli_affected_rows($connect) > 0) {
				$row = mysqli_fetch_assoc($result);
	
				$reviewid = $row['review_id'];
				$rating = $row['rating'];
				$text = $row['review_text'];
				echo "<h3>Your Review:</h3>";
				echo "<div class='stars' style='width:100%;'>";
	
				for ($i = 0; $i < $rating; $i++) {
					echo "<i class='fas fa-star'></i>";
				}
				for ($j = 0; $j < 5 - $rating; $j++) {
					echo "<i class='far fa-star'></i>";
				}
				echo "</div>";

				echo "<p>$text</p>";
				echo "<button onClick='removeMyReview($reviewid)'>Remove Review</button><hr>";

			} else {
				
				echo "<h3>Leave a Review</h3>";
				
				//Review Star Input Section
				echo "<div style='float:left;'><div class='reviewstars' style='left:0; width:100%;'>
  						
    						<input class='reviewstar reviewstar-5' id='reviewstar5' type='radio' name='reviewstar'/>
    						<label class='reviewstar reviewstar-5' for='reviewstar5'></label>

   						<input class='reviewstar reviewstar-4' id='reviewstar4' type='radio' name='reviewstar'/>
    						<label class='reviewstar reviewstar-4' for='reviewstar4'></label>

    						<input class='reviewstar reviewstar-3' id='reviewstar3' type='radio' name='reviewstar'/>
    						<label class='reviewstar reviewstar-3' for='reviewstar3'></label>

    						<input class='reviewstar reviewstar-2' id='reviewstar2' type='radio' name='reviewstar'/>
    						<label class='reviewstar reviewstar-2' for='reviewstar2'></label>

    						<input class='reviewstar reviewstar-1' id='reviewstar1' type='radio' name='reviewstar' checked='checked'/>
    						<label class='reviewstar reviewstar-1' for='reviewstar1'></label>
  						
				</div></div>";
				//End of Review Star Input Section
				
				echo "<textarea cols='10' rows='3' id='reviewtext' name='reviewtext' style='width:100%; height='100px;'></textarea>";
				echo "<button id='submitreview' name='submitreview' onClick='submitReview()'>Add Review</button><hr>";

			}

			mysqli_close($connect);

		}


		include('mysqli_connect.php');
		$query = "SELECT r.rating, r.review_text, u.username FROM review r, user u WHERE r.user_id <> $uid and r.user_id = u.user_id and farmstand_id = $fid";

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