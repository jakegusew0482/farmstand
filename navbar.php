<div class="navbar">
      <a href="index.php">Home</a>
        <?php
                include('config.php');
                if(isset($_SESSION['username'])) {
                        echo"<a href='logout.php'>Log Out</a>";
                }
                else {
                        echo "<a href='loginPage.php'>Log In</a>";
                }
        ?>

      <a href="Feedback.php" class="right">Feedback</a>
      <a href="ContactUs.php" class="right">Contact Us</a>

	<?php	
		if(!(isset($_SESSION['username']))) {
		     echo"<a href='createAccount.php' class='right'>Create Account</a>";
		}
	?>
    </div>

