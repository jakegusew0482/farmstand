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

        <form id='regform' name='regform' method='post' action='registerFarmstand.php' enctype='multipart/form-data'>
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

	 <label for="city"><b>City</b></label>
            <input
              type="text"
              placeholder="Enter City"
              name="city"
              id="city"
              required
            />

	 <label for="state"><b>State</b></label>
            <input
              type="text"
              placeholder="Enter State"
              name="state"
              id="state"
              required
            />

	 <label for="zipcode"><b>Zipcode</b></label>
            <input
              type="text"
              placeholder="Enter Zipcode"
              name="zipcode"
              id="zipcode"
              required
            />


	<input id="uploadImage" type="file" accept="image/*" name="image" />


            <p>
              By creating an account you agree to our
              <a href="#" style="color: dodgerblue">Terms & Privacy</a>.
            </p>

	<p id="output"></p>
	

            <div class="clearfix">
<input class="btn btn-success" type="submit" value="Register">
            </div>
          </div>
        </form>
      </div>
    </div>

<!--
    <div class="footer">
      <h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
    </div>
  </body>
</html>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function (e) {
 $("#regform").on('submit',(function(e) {
e.preventDefault();

	var name = document.getElementById('title').value;
	var desc = document.getElementById('desc').value;
	var user = document.getElementById('user').value;
	var email = document.getElementById('email').value;
	var add = document.getElementById('address').value;
	var pass = document.getElementById('password').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var zip = document.getElementById('zipcode').value;

	if (name != "" && desc != "" & user != "" && email != "" && add != "" && pass != "" && city != "" && state != "" && zip != "") {

		$.ajax({
      			url: "registerFarmstand.php",
  	 		type: "POST",
  			data:  new FormData(this),
   			contentType: false,
        		cache: false,
   			processData:false,
   			success: function(data) {
     				$("#regform")[0].reset(); 
				window.location.href = "http://farmstandwebsite.com/index.php";
	    		}
         
   		});
	} else {
		document.getElementById("output").innerHTML = "Please fill out every field";
	}
}));
});
</script>



