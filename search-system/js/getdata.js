function filterData(input = "") {
  $.ajax({
    type: "post",
    url: "php/actions.php",
    data: {
      input: input,
    },
    success: function (response) {
      $("#search-catalog").html(response);
    },
  });
}

$("#search_text").on("keyup", function () {
  filterData($(this).val());
});
