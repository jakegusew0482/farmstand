	<?php include('navbar.php'); ?>

	<!-- Side Column of Main Page -->
	<div class="row">
		<div class="side">
			<h2>Support Your Local Farm Stand</h2>
			<h3>Search by Type of goods</h3>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Type of stand" />

		</div>

		<!--Main Page-->
		<div class="main">
			<h4>Local Farm Stand News</h4>
			<p>login status:</p>
			<p id='login'></p>
			<div id="myMap" style="height: 400px"></div>
			<script src="scripts/map.js">
			</script>
		</div>
	</div>

	<div class="footer">
		<h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
	</div>
	</body>

	</html>
