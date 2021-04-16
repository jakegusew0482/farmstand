<body onload='loadPage();'>
<link rel="stylesheet" href="styles/orderPageStyle.css" media="screen">

<?php include('navbar.php'); ?>

<div id="orderContainer">
	<div id='orders'>
	<div id='testorder'>

		<div id='orderInfo'>
			<p id='headerp'>STATUS: status<br>ORDER ID: 1<br>CUSTOMER NAME: jake<br>PHONE: 631-123-4567</p>
			<div id='orderButtons'>
				<button type='button' onclick='markOrderReady()'>Mark Ready</button>
				<button type='button' onClick='markOrderComplete()'>Mark Complete</button>
			</div>
		</div>
		<div id='orderItems'>
			<div id='items'>
				<h2>ITEMS</h2>
				<table id='itemTable'>
					<tr>
						<th>Item Name</th>
						<th>Price</th>
						<th>Quantity</th>
					</tr>
					<tr>
						<td> Pepper </td>
						<td> $15 </td>
						<td> 10 </td>
					</tr>
				</table>
			</div>
			<div id='total'>
				<p> TOTAL: $100</p>
			</div>
		</div>
	</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function loadPage() {
	loadOrders();
}

function loadOrders() {
	var fid = "<?php echo $_SESSION['farm_id']; ?>";

	if(fid != "") {
		$.ajax({
			url: "farmstandOrderData.php",
			type: "POST",
			data: {fid:fid},
			dataType: "html",
			success: function(data) {
			var result = $('<div />').append(data).find('#result').html();
            		$('#orders').html(result);						
			}
		});

	}
}
</script>

</body>
</head>