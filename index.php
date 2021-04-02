	<?php include('navbar.php');
	include('config.php');	?>

	<!-- Side Column of Main Page -->
	<div class="row">

		<div class="side">
			<h3>Search for Farmstands</h3>
			<form method="post">

				<select name="searchType" id="searchType">
					<option value="product">Product</option>
					<option value="Farmstand">Farmstand</option>
					<option value="Zip Code">Zip Code</option>
				</select>

				<input type="text" id="searchTerm" placeholder="Enter search term" />

				<button type="button" id="submitSearch">Search</button>
			</form>
		</div>
		<!--Main Page-->
		<div class="main">
			<?php
			if (isset($_SESSION['username'])) {
				echo "<p> You Are Logged In</p>";
			} else {
				echo "<p> You Are Not Logged In</p>";
			}
			?>
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
