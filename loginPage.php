	<?php	include('navbar.php');	?>



<!-- Side Column of Main Page -->
<div class="row">
    
 <!--Main Page-->
  <div class="mainFeedback">
	<h2>Login Existing User or Farmstand Account </h2>

  <div class="container">
<form id='login' name='loginform' method='post'>
    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" id="user" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="pass"required>
        
	<button type='button' name='sub' id='sub'>Login</button>
<!--    <input type='button' name='sub' id='sub' value="Login"> -->
	<p id="demo">logintest</p>
</form>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>


	
    
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
$("#sub").click(function() {
var user = $('#user').val();
var pass = $('#pass').val();
var id = "<?php include('config.php');
		if(isset($_SESSION['username'])) echo 1; else echo 0;?>";

if (user != "" && pass != "" && id == "0") {
$.ajax({
        url:'/login.php',
        type:'post',
        data:{user:user,pass:pass},
        success:function(response){
        var msg="";
        if(response==1){
                msg="success";
                document.getElementById("demo").innerHTML = msg;
		window.location.href = "http://farmstandwebsite.com/index.php";
        } else {
                msg="Failed to Login";
                document.getElementById("demo").innerHTML = msg;
        }
        }
        });
} else if (id == "1") {
	alert('you are already logged in');
}
});
});
</script>

