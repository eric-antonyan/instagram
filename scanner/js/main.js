$(document).ready(function () {
  function setToken(length) {
    let charcters =
      "ABC0123456789DEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    let token = "";

    for (let i = 0; i < length; i++) {
      token += charcters.charAt(Math.floor(Math.random() * length));
    }

    return token;
  }

  function get() {
    $.ajax({
      type: "POST",
      url: "actions/requests/get",
      success: function (response) {
        $(".product-container").html(response);
      },
    });
  }

  setInterval(get, 100);

  const token = setToken(10);
  $("#submit").on("click", function () {
    $.ajax({
      method: "POST",
      url: `actions/requests/add`,
      data: {
        barcode: $("#product-code").val(),
      },
      dataType: "json",
      success: function (response) {
        // code
      },
    });
  });
});
