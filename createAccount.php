    <?php
// Registration page, data is sent to register.php
// if response is success user sent to index.php
	include('navbar.php');	?>

    <!-- Side Column of Main Page -->
    <div class="row">
      
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

            <label for="user"><b>Username</b></label> 	<span id='usererrormsg' style='color:red;'></span>

            <input
              type="text"
              placeholder="Username"
              name="user"
              id="user"
              required
            />

            <label for="pass"><b>Password</b></label>	<span id='passerrormsg' style='color:red;'></span>
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

	<p id="output"></p>
	

            <div class="clearfix">
              <button type='button' name='reg' id='reg'>Register</button>
		<a href='createFarmstand.php'>Create a Farmstand Account</a>
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

var error = 0;
if(user.length < 8) {
	        document.getElementById('usererrormsg').innerHTML="Username must be longer than 8 characters";  
		error++;
} 
if (pass.length < 8) {
		document.getElementById('passerrormsg').innerHTML="Password must be longer than 8 characters";  
		error++;
}

if(user.length > 20) {
	        document.getElementById('usererrormsg').innerHTML="Username must be less than 20 characters long";  
		error++;
} 
if (pass.length > 20) {
		document.getElementById('passerrormsg').innerHTML="Password must be less than 20 characters long";  
		error++;
}


if(user != "" && pass != "" && email != "" && error == 0) {
$.ajax({
	url:'/register.php',
	type:'post',
	data:{user:user,pass:pass,email:email},
	success:function(response){
	var msg="";
	if(response==1) {
		msg="Account Created";
		window.location.replace('index.php');
	} else if(response==2){
		alert("The Username or Email is already in use");
	} else if(response==3) {
		alert("The account could not be created");
	}
	document.getElementById("output").innerHTML = msg;
}
});
} else {
	document.getElementById("output").innerHTML = "Please fill out every field";
}
});
});
</script>
