const username = document.querySelector("#username");
const password = document.querySelector("#password");

$.ajax({
  type: "get",
  url: "fetch/users",
  dataType: "JSON",
  success: function (response) {
    const inputs = document.querySelectorAll(".login-input");

    $("#form").on("submit", function (evt) {
      evt.preventDefault();
    });

    inputs.forEach((input) => {
      input.oninput = () => {
        if (input.value !== "") {
          $(".login__button").prop("disabled", false);
          for (let i = 0; i < response.length; i++) {
            $("#next").on("click", function () {
              if (
                username.value === response[i].username &&
                password.value === response[i].password
              ) {
                $(".status").html("You have successfully logged in");
                $(".status").removeClass("incorrect-text");
                $(".status").addClass("correct-text");
                $(".correct-text").addClass("status");
                $.ajax({
                  type: "post",
                  url: "check/user",
                  data: {
                    username: username.value,
                    password: password.value,
                  },
                  success: function (response) {
                    setTimeout(() => {
                      window.location.href = "/instagram";
                    }, 800);
                  },
                });
              } else {
                $(".login__button").prop("disabled", true);
              }
            });
          }
        }
      };
    });
  },
});
