<!DOCTYPE html>
<?php //header('Access-Control-Allow-Origin: *');
session_start();
?>
<html lang="en">

<head>
	<title>Farm Stand</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="styles/styles.css" media="screen" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<link rel="stylesheet" href="styles/NewMarketPlace.css" media="screen">
	<link rel="stylesheet" href="styles/MarketplacePage.css" media="screen">
	<link rel="stylesheet" href="styles/SearchResult.css" media="screen">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script>
		function logout() {
			$.ajax({
				url: 'logout.php',
				type: 'post',
				success: function(reponse) {
					//window.location.href = "http://farmstandwebsite.com";
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
		
		if (isset($_SESSION['username'])) {
			echo "<a href='logout.php'>Log Out</a>";
		} else {
			echo "<a href='loginPage.php'>Log In</a>";
		}

		if (!(isset($_SESSION['username']))) {
			echo "<a href='createAccount.php'>Create Account</a>";
		} else {
			if ($_SESSION['account_type'] == "farmstand") {
				echo "<a href='ownerMarketPage.php'>My Farmstand</a>";
			} else {
				echo "<a href=''>My Account</a>";
			}
		}
		?>
		<a href="Feedback.php" class='right'>Feedback</a>
	</div>
