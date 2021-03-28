$(document).ready(function (e) {
  $("#searchForm").on("submit", function (e) {
    e.preventDefault();

    var search = document.getElementById("search").value;
    var searchtype = document.getElementById("searchType").value;

    if (search != "") {
      $.ajax({
        url: "searchResult.php",
        type: "POST",
        data: {
          search: search,
          searchtype: searchtype,
        },
        dataType: "html",
        success: function (data) {
          var result = $("<div />").append(data).find("#result").html();
          $("#results").html(result);
        },
      });
    } else {
      alert("Enter Search Term");
    }
  });
});
