<?php include('navbar.php');
include('config.php');	?>

<!-- Side Column of Main Page -->
<div class="row">
	<div class="side">

		<h3>Search For Farmstands!</h3>

		<form id='searchForm'>
			<table style="width:100%;">
				<tr>
					<td>

						<select id="searchType" style="width:30%;">
							<option value="product">Product</option>
							<option value="title">Farmstand Title</option>
							<option value="zipcode">Zipcode</option>
						</select>


						<input type="text" id="search" placeholder="Enter Search Term" style="width:65%;" />


						<!--    <input type="text" id="search" placeholder="Enter Search Term"/>
								</td></tr><tr>
								<label><input type="radio" name="searchOption" id="searchOption">Zipcode</label>
								<label><input type="radio" name="searchOption" id="searchOption">Farmstand Name</label>
								<label><input type="radio" name="searchOption" id="searchOption">Product</label> -->

				</tr>
			</table>
			<button type='submit' id='submitbutton' style="width:95%;">Search</button>

		</form>

		<div id="results" style="overflow:scroll; height:50%;">

		</div>

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
		<script type="module" src="scripts/map.js">
		</script>
	</div>
</div>

<div class="footer">
	<h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
</div>
</body>

</html>
