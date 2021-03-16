<?php

$conn = mysqli_connect("localhost", "farm_user", "password", "farm_db");

$result = mysqli_query($conn, "SELECT address, city, state, zip_code FROM farmstand");

// store in array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

// return response in json
echo json_encode($data);
