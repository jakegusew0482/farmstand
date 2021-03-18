<?php

$conn = mysqli_connect("localhost", "root", "", "farm_db");

$result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand");

// store in array
$data = array();
while ($row = mysqli_fetch_object($result)) {
	array_push($data, $row);
}

// return response in json
echo json_encode($data);
exit();
