<?php
// localhost
/* $serverName = "localhost"; */
/* $username = "root"; */
/* $password = ""; */
/* $dbname = "farm_db"; */

// server data
$serverName = "localhost";
$username = "farm_user";
$password = "password";
$dbname = "farm_db";

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbname);
//
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// works on localhost
/* $sql = "LOAD DATA INFILE '/opt/lampp/htdocs/farmstand/testData/mockData.csv' INTO TABLE farmstand FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS"; */
// $sql = "LOAD DATA INFILE '/opt/lampp/htdocs/farmstand/testData/mockData.csv' INTO TABLE farmstand FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS";

// server 
$sql = "LOAD DATA INFILE '/var/www/farmstandwebsite.com/html/testData/MOCK_DATA.csv' INTO TABLE farmstand FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS";

// works on server
// $sql = "LOAD DATA INFILE '/opt/lampp/htdocs/farmstand/testData/mockData.csv' INTO TABLE farmstand FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS";

if ($conn->query($sql) === TRUE) {
	echo "Records Loaded successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/* Allow to load files on the sever
 *https://stackoverflow.com/questions/59993844/error-loading-local-data-is-disabled-this-must-be-enabled-on-both-the-client 

You may check the local_infile is disabled or enable. So, you try this-

mysql> show global variables like 'local_infile';

if it shows-

+---------------+-------+
| Variable_name | Value |
+---------------+-------+
| local_infile  |  OFF  |
+---------------+-------+
(this means local_infile is disable)

then enable with this-

mysql> set global local_infile=true;

Then check again and quit from mysql server with this-

mysql> exit

Now you have to connect/login server with local_infile. For this run this code from terminal command line-

mysql --local_infile=1 -u root -ppassword DB_name

now load the data from local file-

mysql> load data local infile 'path/file_name.extention' into table table_name;

It's work on my pc. you may try this. thanks.

 */
