const siteBody = document.body;
const siteHeight = window.innerHeight;

siteBody.style.setProperty("--screen-height", siteHeight + "px");

const loginOrPid = document.getElementById("loginOrPid");
const password = document.getElementById("password");

$(".login__form").on("submit", function (e) {
  e.preventDefault();
  if (loginOrPid.value !== "" && password.value !== "") {
    $.ajax({
      type: "post",
      url: "../get-php/login.php",
      data: {
        pid_or_login: loginOrPid.value,
        password: password.value,
      },
      success: function (response) {
        if (response === "unsuccess") {
          $("#message").addClass("show");
          $("#message").html("Ползователь не найдено!");
          setTimeout(() => {
            $("#message").removeClass("show");
            $("#message").html("");
          }, 4000);
        } else {
          $("#message").addClass("show");
          $("#message").html("Вы успешено авторизовани!");
          setTimeout(() => {
            $("#message").removeClass("show");
            $("#message").html("");
          }, 4000);
        }
      },
    });
  } else {
    $("#message").addClass("show");
    $("#message").html("Что-то не так!");
    setTimeout(() => {
      $("#message").removeClass("show");
      $("#message").html("");
    }, 4000);
  }
});

$(".bars").on("click", function () {
  if ($(".bars").attr("status") === "close_bar") {
    $(".bars").removeAttr("status");
    $(".nav-lists").attr("status", 'hide');
    $(".bars .fa").addClass("fa-bars");
    $(".bars .fa").removeClass("fa-xmark");
  } else {
    $(".nav-lists").removeAttr("status");
    $(".bars .fa").removeClass("fa-bars");
    $(".bars .fa").addClass("fa-xmark");
    $(".bars").attr("status", "close_bar");
  }
});

window.onscroll = function(e) {
  if (Math.floor(this.scrollY) >= 150) {
    $(".admin__header").addClass('sticky');
  } else {
    $(".admin__header").removeClass('sticky');
  }
}
