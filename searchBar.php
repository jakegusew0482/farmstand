<div class="side">

        <h3>Search For Farmstands!</h3>

	<form id='searchForm'>
        <input type="text" id="search" placeholder="Enter Search Term"/>

	<button type='submit' id='submitbutton'>Search</button>
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
					
				if(search != "") {

					$.ajax({
						url: "searchResult.php",
						type: "POST",
						data: {search:search},
						dataType: "html",
						success: function(data) {
						var result = $('<div />').append(data).find('#result').html();
            					$('#results').html(result);						}
					});
					} else {
					alert('Enter Search Term');
					}
				}));
			});
		</script>
