<?php
//Retrieves all the posts for the farmstand owner market page.
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
							echo"<div id='post' style='height:80%;width:400px;border:solid;float:left;'>
							<h2>$title</h2>
							<p style='word-wrap: break-word;text-align:left;margin-left:1%;'>$desc</p>
							<h3 style='display:none;'>$pid</h3>";
							
							
							echo "<button id='removepost' onClick='removePost($pid)'>Remove Post</button>"; 
							echo"</div>";
						
						}
						

					} 
					echo "</div>";
				mysqli_close($connect);
				?>