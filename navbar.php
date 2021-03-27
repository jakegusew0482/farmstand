<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *');
?>
<html lang="en">

<head>
	<title>Farm Stand</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="styles/styles.css" media="screen" />
	<link rel="stylesheet" href="styles/NewMarketPlace.css" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<!-- Make sure you put this AFTER Leaflet's CSS -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
	<script>
		function logout() {
			$.ajax({
				url: 'logout.php',
				type: 'post',
				success: function(reponse) {
					window.location.href = "http://farmstandwebsite.com";
				}
			});
		}
	</script>

	<!-- script src="scripts/SearchBarScript.js"></script>-->
</head>

<body>
	<div class="header">
		<h1>Farm Stand Website</h1>
		<p>Find Local Stand Near You</p>
	</div>



	<div class="navbar">
		<a href="index.php">Home</a>
		<?php
		include('config.php');
		if (isset($_SESSION['username'])) {
			echo "<a onclick='logout()'>Log Out</a>";
		} else {
			echo "<a href='loginPage.php'>Log In</a>";
		}
		?>


		<!--<a href="ContactUs.php" class="right">Contact Us</a>-->

		<?php
		if (!(isset($_SESSION['username']))) {
			echo "<a href='createAccount.php'>Create Account</a>";
		} else {
			if ($_SESSION['account_type'] == "farmstand") {
				echo "<a href='NewMarketPlace.php'>My Farmstand</a>";
			} else {
				echo "<a href=''>My Account</a>";
			}
		}
		?>
		<a href="Feedback.php" class='right'>Feedback</a>
	</div>
