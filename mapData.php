<?php
header("Access-Control-Allow-Origin: *");

/* include("mysqli_connect.php"); */

// connects to localhost - uncomment to test it in your localhost
$conn = mysqli_connect("localhost", "root", "", "farm_db");

// server host
/* $conn = mysqli_connect("localhost", "farm_user", "password", "farm_db"); */

// local host
/* $result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand"); */
$result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand");

// Search Farmstand 
/* if (isset($_POST['search'])) */
/* 	$searchTerm = $_POST['search']; */
/* else */
/* 	$searchTerm = NULL; */

/* if (isset($_POST['searchtype'])) */
/* 	$searchType = $_POST['searchtype']; */
/* else */
/* 	$searchType = NULL; */

/* if ($searchType == "product") { */
/* 	$query = "SELECT f.title, f.description, f.coverimage, p.name FROM farmstand AS f INNER JOIN " + */
/* 		"product AS p on p.farmstand_id = f.farmstand_id WHERE p.name LIKE '%$searchterm%'"; */
/* } else if ($searchType == "title") { */
/* 	$query = "SELECT title, description, coverimage FROM farmstand WHERE title LIKE '%$searchterm%'"; */
/* } else if ($searchType == "zipcode") { */
/* 	$query = "SELECT * from farmstand where zip_code like '%$searchterm%'"; */
/* } else { */
/* 	$query = "SELECT farmstand_id, title ,address, city, state, zip_code FROM farmstand"; */
/* } */

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
