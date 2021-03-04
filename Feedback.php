<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Farm Stand</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/indexStyle.css" media="screen" />
    <script src="indexJS.js"></script>
  </head>
  <body>
    <div class="header">
      <h1>Feedback Page</h1>
      <p>We would love to hear from you</p>
    </div>

    <?php include('navbar.php'); ?>

    <!-- Side Column of Main Page -->
    <div class="row">
      <div class="side">
        <h2>Support Your Local Farm Stand</h2>
        <button onclick="getLocation()">Find Near Me</button>

        <h3>Search by Type of goods</h3>
        <input
          type="text"
          id="myInput"
          onkeyup="myFunction()"
          placeholder="Search for Type of stand"
        />
      </div>

      <!--Main Page-->
      <div class="mainFeedback">
        <h4>Local Farm Stand Feedback</h4>

        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" required />
        <textarea
          name="email"
          id="email"
          cols="30"
          rows="10"
          placeholder="Type review here"
        ></textarea>

        <button type="submit">Submit</button>
      </div>
    </div>

    <div class="footer">
      <h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
    </div>
  </body>
</html>