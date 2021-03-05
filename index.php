<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Farm Stand</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/indexStyle.css" media="screen" />
    <script src="scripts/indexJS.js"></script>
    <script src="scripts/SearchBarScript.js"></script>	  
  </head>
  <body onload='checkLogin()'>
    <div class="header">
      <h1>AddHealth Choices At Your Local Stand</h1>
      <p>Find Local Stand Near You</p>
    </div>

	<?php include('navbar.php'); ?>

    <!-- Side Column of Main Page -->
    <div class="row">
      <div class="side">
        <h2>Support Your Local Farm Stand</h2>
        <button onclick="getLocation" id="getLocation">Find Near Me</button>

	       
        <h3>Search by Type of goods</h3>
        <input
          type="text"
          id="myInput"
          onkeyup="myFunction()"
          placeholder="Search for Type of stand"
        />
		    
      </div>

      <!--Main Page-->
      <div class="main">
        <h4>Local Farm Stand News</h4>

        <p>login status:</p>
        <p id='login'></p>
      </div>
    </div>

    <div class="footer">
      <h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
    </div>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script language='Javascript' type='text/javascript'>


</script>


