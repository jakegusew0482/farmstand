<table>
	<tr>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip Code</th>
	</tr>
	<tbody id="data"></tbody>
</table>

<script>
	// call ajax
	let ajax = new XMLHttpRequest();
	let method = "GET";
	let url = "mapData.php"
	let asynchronous = true;

	ajax.open(method, url, asynchronous);

	// send ajax request
	ajax.send();

	// receive response from mapData.php
	ajax.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			(this.responseText)
		}
	}
</script>
