<?php
header("Access-Control-Allow-Origin: *");

include("mysqli_connect.php");

// connects to localhost - uncomment to test it in your localhost
/* $conn = mysqli_connect("localhost", "root", "", "farm_db"); */

// server host
/* $conn = mysqli_connect("localhost", "farm_user", "password", "farm_db"); */

// local host
/* $result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand"); */
// $result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand");

// Search Farmstand 
if (isset($_POST['search']))
	$searchTerm = $_POST['search'];

if (isset($_POST['searchtype']))
	$searchType = $_POST['searchtype'];

if ($searchType == "product") {
	$query = "SELECT f.title, f.description, f.coverimage, p.name FROM farmstand AS f INNER JOIN " +
		"product AS p on p.farmstand_id = f.farmstand_id WHERE p.name LIKE '%$searchTerm%'";
} else if ($searchType == "title") {
	$query = "SELECT title, description, coverimage FROM farmstand WHERE title LIKE '%$searchTerm%'";
} else if ($searchType == "zipcode") {
	$query = "SELECT * from farmstand where zip_code like '%$searchTerm%'";
} else {
	$query = "SELECT farmstand_id, title ,address, city, state, zip_code FROM farmstand";
}

// server data
// Working result query
/* $result = mysqli_query($connect, "SELECT title ,address, city, state, zip_code FROM farmstand"); */
//$query = "SELECT farmstand_id, title ,address, city, state, zip_code FROM farmstand";


// Test for search for farmstands
$result = mysqli_query($connect, $query);


// empty array to store query $result 
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	array_push($data, $row);
}

// return response in json
echo json_encode($data);

exit();
