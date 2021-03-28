<?php

	include('mysqli_connect.php');

	if(isset($_POST['search'])) $searchterm = $_POST['search']; else $searchterm = NULL;
	if(isset($_POST['searchtype'])) $searchtype = $_POST['searchtype']; else $searchtype = NULL;

	if($searchtype == "product") {
		$query = "select f.title, f.description, f.coverimage, p.name from farmstand as f inner join product as p on p.farmstand_id = f.farmstand_id where p.name LIKE '%$searchterm%'";

	} elseif($searchtype == "title") {
		$query = "select title, description, coverimage from farmstand where title like '%$searchterm%'";
	} elseif($searchtype == "zipcode") {
		$query = "select * from farmstand where zip_code like '%$searchterm%'";
	}

	$result = mysqli_query($connect, $query);
	echo "<div id='result'>";
	echo "<table><tr>";

	while($row = mysqli_fetch_assoc($result)) {
		$title = $row['title'];
		$desc = $row['description'];
		$img = $row['coverimage'];
		
		echo "<td><h2>$title</h2><h3>$desc</h3><h3>$img</h3></td></tr><tr>";
	}

	echo "</tr></table>";
	
	echo "</div>";	

	mysqli_close($connect);
?>