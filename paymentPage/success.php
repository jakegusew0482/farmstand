<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
</head>
<body onload='makeOrder();'>
    <h2>Payment Successful</h2>

<?php

$userId = $_GET['userId'];
$farmId = $_GET['farmId'];

echo "<h2>$userId, $farmId </h2>";

?>

    <a href="../index.php">Take me back home</a>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function makeOrder() {

var fid = "<?php echo $_GET['farmId']; ?>";
var uid = "<?php echo $_GET['userId']; ?>";
var paid = 1;

		$.ajax({
			url: "../moveCartToOrder.php",
			type: "POST",
			data: {farmstand_id:fid, user_id:uid, paid:paid},
			success: function(response) {
				if(response == 1) {
					window.location.replace("../userOrderPage.php");
				} else {
					alert('your order could not be completed, please contact support');
				}				
			}
		});
}


</script>
