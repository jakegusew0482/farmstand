<body onload='loadPage();'>
<link rel="stylesheet" href="styles/orderPageStyle.css" media="screen">

<?php include('navbar.php'); ?>
<div id='buttons' style='margin-left:25%; margin-right:25%;'>
	<button type='button' class='filterButton' onclick='showActive()'>Active Orders</button>
	<button type='button' class='filterButton' onclick='showComplete()'>Completed Orders</button>
</div>

<div id="orderContainer">

	<div id='activeOrders'>
	
	</div>
	<div id='completeOrders'>
	
	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function loadPage() {
	loadActiveOrders();
	loadCompletedOrders();
}

function loadActiveOrders() {
	var uid = "<?php echo $_SESSION['user_id']; ?>";
	if(uid != "") {
		$.ajax({
			url: "userActiveOrderData.php",
			type: "POST",
			data: {uid:uid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#newresult').html();
            		$('#activeOrders').html(result);						
			}
		});
	}
}

function loadCompletedOrders() {
	var uid = "<?php echo $_SESSION['user_id']; ?>";
	if(uid != "") {
		$.ajax({
			url: "userCompleteOrderData.php",
			type: "POST",
			data: {uid:uid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#completeresult').html();
            		$('#completeOrders').html(result);						
			}
		});
	}

}

function showActive() {
	document.getElementById("activeOrders").style.display = "block";
	hideComplete();
}

function hideActive() {
	document.getElementById("activeOrders").style.display = "none";
}

function showComplete() {
	document.getElementById("completeOrders").style.display = "block";
	hideActive();
}

function hideComplete() {
	document.getElementById("completeOrders").style.display = "none";
}

</script>

</body>
</html>