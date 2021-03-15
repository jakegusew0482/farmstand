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
        <h2>Create Farmstand Account</h2>

        <form id='register' name='registerform' method='post'>
          <div class="container">
            <h1>Register Your Farmstand</h1>
            <p>Please fill in this form to register your farmstand.</p>
            <hr />

            <label for="title"><b>Farmstand Name</b></label>
            <input
              type="text"
              placeholder="Farmstand Name"
              name="title"
              id="title"
              required
            />

            <label for="desc"><b>Description</b></label>
            <input
              type="text"
              placeholder="Description"
              name="desc"
              id="desc"
              required
            />

            <label for="user"><b>Username to Login With</b></label>
            <input
              type="text"
              placeholder="Enter a Username"
              name="user"
              id="user"
              required
            />

	    <label for="email"><b>Email</b></label>
            <input
              type="text"
              placeholder="Enter Email"
              name="email"
              id="email"
              required
            />


            <label for="address"><b>Address of Farmstand</b></label>
            <input
              type="text"
              placeholder="Enter Address"
              name="address"
              id="address"
              required
            />

<label for="password"><b>Password for farmstand login</b></label>
            <input
              type="text"
              placeholder="Enter Password"
              name="password"
              id="password"
              required
            />



            <p>
              By creating an account you agree to our
              <a href="#" style="color: dodgerblue">Terms & Privacy</a>.
            </p>

	<p id="output"></p>
	

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
	
var title = $('#title').val();
var desc = $('#desc').val();
var user = $('#user').val();
var email = $('#email').val();
var address = $('#address').val();
var password = $('#password').val();
if(title != "" && desc != "" && user != "" && email != "" && address != "" && password != "") {
$.ajax({
	url:'/registerFarmstand.php',
	type:'post',
	data:{title:title, desc:desc, user:user, email:email, address:address, password:password},
	success:function(response){

	if(response==0){
	document.getElementById("output").innerHTML = "Account Not Created";
	}

	if(response==1) {
		document.getElementById("output").innerHTML = "Account Created";

	} else if(reponse==2) {
		document.getElementById("output").innerHTML = "Account Not Created";

	} else if (response==3) {
	}
	
}
});
} else {
	document.getElementById("output").innerHTML = "All Fields Must be Filled Out";

}
});
});
</script>
