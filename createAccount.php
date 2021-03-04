<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Farm Stand Sign Up</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/indexStyle.css" media="screen" />
  <!--  <script src="indexJS.js"></script> -->
  </head>
  <body>
    <div class="header">
      <h1>Create Account</h1>
    </div>

    <?php	include('navbar.php');	?>

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
        <h2>Create Account as Customer</h2>

        <form id='register' name='registerform' method='post'>
          <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account as customer.</p>
            <hr />

            <label for="email"><b>Email</b></label>
            <input
              type="text"
              placeholder="Enter Email"
              name="email"
              id="email"
              required
            />

            <label for="user"><b>Username</b></label>
            <input
              type="text"
              placeholder="Username"
              name="user"
              id="user"
              required
            />

            <label for="pass"><b>Password</b></label>
            <input
              type="password"
              placeholder="Enter Password"
              name="pass"
              id="pass"
              required
            />

            <label for="passwordRepeat"><b>Repeat Password</b></label>
            <input
              type="password"
              placeholder="Repeat Password"
              name="passwordRepeatName"
              required
              id="passwordRepeat"
            />

            <label>
              <input
                type="checkbox"
                checked="checked"
                name="remember"
                style="margin-bottom: 15px"
              />
              Remember meAccount
            </label>

            <p>
              By creating an account you agree to our
              <a href="#" style="color: dodgerblue">Terms & Privacy</a>.
            </p>

	<p id="testp">test field</p>
	

            <div class="clearfix">
              <button type='button' name='reg' id='reg'>Register</button>
		<button type="button" class="cancelBtn">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="footer">
      <h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
    </div>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script language='JavaScript' type='text/javascript'>

$(document).ready(function() {
$("#reg").on('click',function() {
var user = $('#user').val();
var pass = $('#pass').val();
var email = $('#email').val();

if(user != "" && pass != "" && email != "") {
$.ajax({
	url:'/register.php',
	type:'post',
	data:{user:user,pass:pass,email:email},
	success:function(response){
	var msg="";
	if(response==1) {
		msg="account created";
	
	} else {
		msg = "account not created";
	}
	document.getElementById("testp").innerHTML = msg;
}
});
}
});
});
</script>
