
    <?php 
// Farmstand Registration Page
// Data is sent to registerFarmstand.php
	include('navbar.php');	?>

    <!-- Side Column of Main Page -->
    <div class="row">

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
<select name="state" id="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>

      <!--      <input
              type="text"
              placeholder="Enter State"
              name="state"
              id="state"
              required
            /> -->

	 <label for="zipcode"><b>Zipcode</b></label>
            <input
              type="text"
              placeholder="Enter Zipcode"
              name="zipcode"
              id="zipcode"
              required
            />

	<label for="uploadImage"><b>Cover Image</b></label>
		<input id="uploadImage" type="file" accept="image/*" name="image" />

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
	var file = document.getElementById('uploadImage').files.length;

	if (name != "" && desc != "" & user != "" && email != "" && add != "" && pass != "" && city != "" && state != "" && zip != "" && file > 0) {

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



