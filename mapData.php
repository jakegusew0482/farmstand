<?php
header("Access-Control-Allow-Origin: *");
$conn = mysqli_connect("localhost", "root", "", "farm_db");

$result = mysqli_query($conn, "SELECT title ,address, city, state, zipCode FROM farmstand");

/*
echo "<table border='1' >
<tr>
<td align=center> <b>Title</b></td>
<td align=center><b>Address</b></td>
<td align=center><b>City</b></td>
<td align=center><b>State</b></td></td>
<td align=center><b>Zip Code</b></td>";

while ($data = mysqli_fetch_row($result)) {

	echo "<tr>";
	echo "<td align=center>$data[0]</td>";
	echo "<td align=center>$data[1]</td>";
	echo "<td align=center>$data[2]</td>";
	echo "<td align=center>$data[3]</td>";
	echo "<td align=center>$data[4]</td>";
	echo "</tr>";
}

echo "</table>";
 */
// store in array
$data = array();
while ($row = mysqli_fetch_object($result)) {
	array_push($data, $row);
}

// return response in json
echo json_encode($data);
exit();
