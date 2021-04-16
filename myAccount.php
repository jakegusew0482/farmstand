		<link rel="stylesheet" href="styles/accSetting.css" media = "screen">


<?php include('navbar.php');
	include('config.php'); ?>
<body onload='loadPage();'>
	<div id = "AccSettingUserInfo">
	<div id = "AccSettingLogIn">

		<div id='accountInfo'>
		<label style='width:60px; float:left;margin:10px;height:10px;' for="username">Username:</label> <p style='width:30px;height:10px; float:left;margin:10px;'><?php echo "  " . $_SESSION['username']; ?></p><br><br>
		<label style='width:60px; float:left;margin:10px;height:10px;' for="email">Email:</label> <p style='width:30px; height:10px;float:left;margin:10px;'><?php echo $_SESSION['email']; ?></p><br><br>
		<button style='width:100%; float:left;margin-left:auto;margin-right:auto;height:10%;'onClick="showPasswordInput()" id="showPasswordInput" name="showPasswordInput">Change Password</button>

		</div>
		

		<div id='passwordFormDiv' style='display:none; height=100%;'>
		<form id='passForm' name='passForm' method='post' action='changePassword.php'>
			<input type="password" id="currentPassword" name="currentPassword"	placeholder="Current Password" ><br><br>
			<input type="password" id="newPassword"  	name="newPassword"	placeholder="New Password"><br><br>
			<input type="password" id="confNewPassword" name="confNewPassword" 	placeholder="Confirm New Password"><br>
			<span id='errormsg' style='color:red;width:100%; float:left;margin:10px;height:10px;''></span><br>
			<div id='buttons' style='width:90%; float:left;margin:10px;height:10px;'>
			<input type='submit' style='width:100%;'>
			<button type='button' onclick="hidePasswordInput()">Cancel</button>
			</div>
			<br>

		</form>
			

		</div>
	</div>
</div>	

<div id = "AccSettingRecomended">
	<div class="col-25">
		<div class="container">
		  <h4>Your Carts
			<span class="price" style="color:black">
			  <i class="fa fa-shopping-cart"></i>
			</span>
				<div id='carts'>
		  				
				</div>		
				</div>
	
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function(e) {
	$("#passForm").on('submit', (function(e) {
		e.preventDefault();

	var newPassword = document.getElementById('newPassword').value;
	var confNewPassword = document.getElementById('confNewPassword').value;
	var error = 0;

	if (newPassword.length > 15) {
		document.getElementById('errormsg').innerHTML="Password must be less than 15 characters long";  
		error++;
	}
	 
	if(newPassword == confNewPassword && error == 0) {
		var currentPassword = document.getElementById('currentPassword').value;
		var uid = "<?php echo $_SESSION['user_id']; ?>";
		$.ajax({
			url: "changePassword.php",
			type: "POST",
			data: {currentPassword:currentPassword,newPassword:newPassword,uid:uid},
			success:function(response) {
				if(response==1) {
					alert('password changed');
					hidePasswordInput();
				} else if (response==2) {
					document.getElementById('errormsg').innerHTML="Wrong current password";  

				} else {
					document.getElementById('errormsg').innerHTML="Could not change password";  
				}
			}
		});
	} else {
		document.getElementById('errormsg').innerHTML="New Passwords Must Match";  
	}
	}));
});

function loadPage() {
	loadCart();
}

function loadCart() {
	var id = "<?php echo $_SESSION['user_id']; ?>";

	if(id != 0) {
		$.ajax({
		url: "myAccountCartData.php",
		type: "POST",
		data: {id:id},
		dataType: "html",
		success: function(data) {
		var result = $('<div />').append(data).find('#result').html();
            	$('#carts').html(result);						}
	});

	}
}


function showPasswordInput() {
	document.getElementById('passwordFormDiv').style.display = "block";
	document.getElementById('showPasswordInput').style.display = "none";
	document.getElementById('accountInfo').style.display = "none";
}

function hidePasswordInput() {
	document.getElementById('passwordFormDiv').style.display = "none";
	document.getElementById('showPasswordInput').style.display = "block";
	document.getElementById('accountInfo').style.display = "block";
	$("#passForm")[0].reset();
	document.getElementById('errormsg').innerHTML="";  

}

function removeFromCart(cart_id) {
	$.ajax({
		url: "removeFromCart.php",
		type: "POST",
		data: {cart_id:cart_id},
		success: function(response) {
			if (response == 1) {
				loadCart();			
			} else {
				alert("could not remove item");
			}
		}
	});
}
</script>
</body>
</html>
