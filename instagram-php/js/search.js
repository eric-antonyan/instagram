$(document).ready(function() {
  $("#searchQuery").on("input", function () {
    $.ajax({
      type: "post",
      url: "fetch/query",
      data: {
        search_query: $("#searchQuery").val(),
      },
      success: function (response) {
        $(".users").html(response);
      },
    });
  });
})
