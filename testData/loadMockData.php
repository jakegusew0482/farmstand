<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "farm_db";

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbname);
//
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "LOAD DATA INFILE '/opt/lampp/htdocs/farmstand/mockData.csv' INTO TABLE farmstand FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS";

if ($conn->query($sql) === TRUE) {
	echo "Records Loaded successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
