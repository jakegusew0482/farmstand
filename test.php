<body onload='getData()'>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>

function getData() {

var search = "soup";
var searchtype = "product";
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "mapData.php",
    data: { search: search, searchtype: searchtype },
    success: function (response) {
	alert(response);
	alert(response[0].address);
	for(let i = 0; i < response.lenght; i++){
		console.log(response[i].address)}
                 }
        });
}
</script>
