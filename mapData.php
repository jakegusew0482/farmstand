<?php
header("Access-Control-Allow-Origin: *");

// connects to localhost - uncomment to test it in your localhost
/* $conn = mysqli_connect("localhost", "root", "", "farm_db"); */

// server host
$conn = mysqli_connect("localhost", "farm_user", "password", "farm_db");

// local host
<<<<<<< HEAD
/* $result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand"); */
=======
// $result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand");
>>>>>>> 9c04fe48c1bacf535bc8627b7fd6ea1fcfb26a8d

// server data
$result = mysqli_query($conn, "SELECT title ,address, city, state, zip_code FROM farmstand");

// empty array to store query $result 
$data = array();
while ($row = mysqli_fetch_object($result)) {
	array_push($data, $row);
}

// return response in json
echo json_encode($data);

exit();
