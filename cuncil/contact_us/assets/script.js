const name = document.querySelector("#name");
const email = document.querySelector("#email");
const message = document.querySelector("#message");

$("form").on("submit", function (event) {
  event.preventDefault();
  if (
    name.value === "" ||
    email.value === "" ||
    message.value === "" ||
    message.value.length <= 10
  ) {
    $(".message").removeClass("show");
    $(".message").addClass("show");
    $(".message").html("Լրացրեք բոլոր դաշտերը");

    setTimeout(function() {
        $(".message").removeClass("show");
    }, 1500)

  } else {
    $.ajax({
      type: "post",
      url: "./get-php/contact.php",
      data: {
        name: name.value,
        email: email.value,
        message: message.value,
      },
      success: function (response) {
        $(".message").removeClass("show");
        $(".message").addClass("show");
        $(".message").html(response);

        setTimeout(function() {
            $(".message").removeClass("show");
        }, 2000)
      },
    });
  }
});
