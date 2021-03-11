<!DOCTYPE html>
<html lang="en">

<head>
	<title>Farm Stand</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="styles/styles.css" media="screen" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<script src="scripts/indexJS.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<!-- script src="scripts/SearchBarScript.js"></script>-->
</head>

<body>
	<div class="header">
		<h1>Add Health Choices At Your Local Stand</h1>
		<p>Find Local Stand Near You</p>
	</div>



	<div class="navbar">
		<a href="index.php">Home</a>
		<a href="farmstands.php">Farm Stands</a>
		<?php
		include('config.php');
		if (isset($_SESSION['username'])) {
			echo "<a href='logout.php'>Log Out</a>";
		} else {
			echo "<a href='loginPage.php'>Log In</a>";
		}
		?>

		<a href="Feedback.php" class="right">Feedback</a>
		<a href="ContactUs.php" class="right">Contact Us</a>

		<?php
		if (!(isset($_SESSION['username']))) {
			echo "<a href='createAccount.php' class='right'>Create Account</a>";
		}
		?>
	</div>
