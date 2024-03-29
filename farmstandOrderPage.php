<body onload='loadPage();'>
<link rel="stylesheet" href="styles/orderPageStyle.css" media="screen">

<?php include('navbar.php'); ?>
<div id='buttons'>
	<button type='button' class='filterButton' onclick='showNew()'>New Orders</button>
	<button type='button' class='filterButton' onclick='showReady()'>Ready Orders</button>
	<button type='button' class='filterButton' onclick='showComplete()'>Completed Orders</button>
</div>

<div id="orderContainer">

	<div id='newOrders'>
	
	</div>
	<div id='readyOrders'>
	
	</div>
	<div id='completeOrders'>
	
	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function loadPage() {
	loadNewOrders();
	loadReadyOrders();
	loadCompleteOrders();
	showNew();
}

function refreshOrders() {
var current = 0;
	if(document.getElementById("newOrders").style.display == "block") {
		current = 1;
	} else if(document.getElementById("readyOrders").style.display == "block") {
		current = 2;
	} else if(document.getElementById("completeOrders").style.display == "block") {
		current = 3;
	}

	loadPage();

	if(current == 1) {
		showNew();
	} else if (current == 2) {
		showReady();
	} else if (current == 3) {
		showComplete();
	}

}

function loadNewOrders() {
	var fid = "<?php echo $_SESSION['farm_id']; ?>";

	if(fid != "") {
		$.ajax({
			url: "farmstandNewOrderData.php",
			type: "POST",
			data: {fid:fid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#newresult').html();
            		$('#newOrders').html(result);						
			}
		});

	}
}

function loadReadyOrders() {
	var fid = "<?php echo $_SESSION['farm_id']; ?>";

	if(fid != "") {
		$.ajax({
			url: "farmstandReadyOrderData.php",
			type: "POST",
			data: {fid:fid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#readyresult').html();
            		$('#readyOrders').html(result);						
			}
		});

	}
}

function loadCompleteOrders() {
	var fid = "<?php echo $_SESSION['farm_id']; ?>";

	if(fid != "") {
		$.ajax({
			url: "farmstandCompleteOrderData.php",
			type: "POST",
			data: {fid:fid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#completeresult').html();
            		$('#completeOrders').html(result);						
			}
		});

	}
}

function markOrderReady(order_id) {
if(order_id != "") {
	var method = 1;
	$.ajax({
		url: "changeFarmstandOrderStatus.php",
		type: "POST",
		data: {order_id:order_id, method:method},
		dataType: "html",
		success: function(response) {
			if (response==1) {
				refreshOrders();
			}
		}
	});

}

}

function markOrderComplete(order_id) {
if(order_id != "") {
	var method = 2;
	$.ajax({
		url: "changeFarmstandOrderStatus.php",
		type: "POST",
		data: {order_id:order_id, method:method},
		dataType: "html",
		success: function(response) {
			if (response==1) {
				refreshOrders();
			}
		}
	});

}

}

function showNew() {
	document.getElementById("newOrders").style.display = "block";
	hideReady();
	hideComplete();
}

function hideNew() {
	document.getElementById("newOrders").style.display = "none";
}

function showReady() {
	document.getElementById("readyOrders").style.display = "block";
	hideNew();
	hideComplete();
}

function hideReady() {
	document.getElementById("readyOrders").style.display = "none";
}

function showComplete() {
	document.getElementById("completeOrders").style.display = "block";
	hideNew();
	hideReady();
}

function hideComplete() {
	document.getElementById("completeOrders").style.display = "none";
}
</script>

</body>
</head>