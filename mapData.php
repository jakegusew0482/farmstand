<?php
header("Access-Control-Allow-Origin: *");

include("mysqli_connect.php");

// connects to localhost - uncomment to test it in your localhost
// $conn = mysqli_connect("localhost", "root", "", "farm_db");

// server host
/* $conn = mysqli_connect("localhost", "farm_user", "password", "farm_db"); */

// local host
/* $result = mysqli_query($conn, "SELECT title ,address, city, state, zip_code FROM farmstand"); */

if (isset($_POST['searchTerm'])) {
	$searchTerm = $_POST['searchTerm'];
} else {
	$searchTerm = NULL;
}

if (isset($_POST['searchType'])) {
	$searchType = $_POST['searchType'];
} else {
	$searchType = NULL;
}

if ($searchType == "farmstand") {
	$query = "SELECT farmstand_id, title, address, city, state, zip_code from farmstand where title like '%$searchTerm%'";
} else if ($searchType == "product") {
	$query = "select f.title, f.description, f.coverimage, f.farmstand_id, p.name from farmstand as f inner join product as p on p.farmstand_id = f.farmstand_id where p.name LIKE '%$searchTerm%'";
} else if ($searchType == "zip_code") {
	$query = "SELECT farmstand_id, title, address, city, state, zip_code from farmstand where zip_code like '%$searchTerm%'";
} else if ($searchType == "") {
	$query = "SELECT farmstand_id, title ,address, city, state, zip_code FROM farmstand";
}

$result = mysqli_query($connect, $query);

// server data
// Working result query
/* $result = mysqli_query($conn, "SELECT title ,address, city, state, zip_code FROM farmstand"); */

// Test for search for farmstands
//$result = mysqli_query($conn, $query);


// empty array to store query $result 
$data = array();
while ($row = mysqli_fetch_object($result)) {
	array_push($data, $row);
}

// return response in json
echo json_encode($data);

exit();
