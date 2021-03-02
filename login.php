
<?php

        include('config.php');
	include('mysqli_connect.php');

        $table          ="user";

        if(isset($_POST['user'])) $user = $_POST['user']; else $user = NULL; // Get user if set

        if(isset($_POST['pass'])) $pass = $_POST['pass']; else $pass = NULL; // Get pass if set

        if($user != NULL && $pass != NULL) {

                $query = "SELECT * FROM $table WHERE username='$user' and password='$pass';";

                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0) { // If user found
                $_SESSION['username'] = $user;
                echo 1;
                } else {
                echo 0;
                }
        }

mysqli_close($connect);

?>





