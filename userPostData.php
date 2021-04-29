<?php
// Gets post data for the user market page
include('mysqli_connect.php');
					
					if(isset($_POST['id'])) $id = $_POST['id']; else $id = NULL;
				
					echo "<div id = 'result'>";

					if($id != NULL) {
						$query = "SELECT * FROM news WHERE farmstand_id = '$id';";

						$result = mysqli_query($connect, $query);
					
						while($row = mysqli_fetch_assoc($result)) {
							$title = $row['title'];
							$desc = $row['description'];
							$pid = $row['post_id'];
							echo"<div id='post' style='height:100%;width:400px;border:solid;float:left;'>
							<h2>$title</h2>
							<p style='word-wrap: break-word;text-align:left;margin-left:1%;'>$desc</p>
							<h3 style='display:none;'>$pid</h3>";
							 
							echo"</div>";
							
						}
						

					} 
					echo "</div>";
				mysqli_close($connect);
				?>