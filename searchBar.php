<div class="side">

	<h3>Search For Farmstands!</h3>

	<form id='searchForm'>
		<table style="width:100%;">
			<tr>
				<td>

					<select id="searchType" style="width:30%;">
						<option value="product">Product</option>
						<option value="title">Farmstand Title</option>
						<option value="zipcode">Zipcode</option>
					</select>


					<input type="text" id="search" placeholder="Enter Search Term" style="width:65%;" />


					<!--    <input type="text" id="search" placeholder="Enter Search Term"/>
	</td></tr><tr>
	<label><input type="radio" name="searchOption" id="searchOption">Zipcode</label>
	<label><input type="radio" name="searchOption" id="searchOption">Farmstand Name</label>
	<label><input type="radio" name="searchOption" id="searchOption">Product</label> -->


			</tr>
		</table>
		<button type='submit' id='submitbutton' style="width:95%;">Search</button>

	</form>

	<div id="results" style="overflow:scroll; height:50%;">

	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function(e) {
		$("#searchForm").on('submit', (function(e) {
			e.preventDefault();

			var search = document.getElementById('search').value;
			var searchtype = document.getElementById('searchType').value;

			if (search != "") {

				$.ajax({
					url: "searchResult.php",
					type: "POST",
					data: {
						search: search,
						searchtype: searchtype
					},
					dataType: "html",
					success: function(data) {
						var result = $('<div />').append(data).find('#result').html();
						$('#results').html(result);
					}
				});
			} else {
				alert('Enter Search Term');
			}
		}));
	});
</script>
