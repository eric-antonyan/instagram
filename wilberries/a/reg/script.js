const phoneNumber = document.querySelector("#phoneNumber");

if (phoneNumber) {
  phoneNumber.oninput = () => {
    if (phoneNumber.value.length == 8) {
      let replacedStr = phoneNumber.value.replace(/\d+/g, "$&-");
      phoneNumber.value = replacedStr;
      let newText = phoneNumber.value.slice(0, -1);
      phoneNumber.value = newText;
    }

    let replacedText = phoneNumber.value.replace(/[a-zA-Zա-ֆфа-я+]/g, "");
    phoneNumber.value = replacedText;
  };
}

const siteBody = document.body;
const siteHeight = window.innerHeight;

siteBody.style.setProperty("--screen-height", siteHeight + "px");

const companyName = document.querySelector(".company_name");
const creatorName = document.querySelector(".creator_name");
const createPassword = document.querySelector(".create__password");
const confirmPassword = document.querySelector(".confirm__password");
const submitForm = document.querySelector(".submit__form");

$("#submitForm").on("submit", function (e) {
  e.preventDefault();
  if (
    companyName.value !== "" &&
    creatorName.value !== "" &&
    phoneNumber.value !== "" &&
    createPassword.value === confirmPassword.value
  ) {
    
    $.ajax({
      type: "post",
      url: "../../get-php/reg.php",
      data: {
        company_name: $('.company_name').val(),
        first_name: $('.creator_name').val(),
        phone: $('#phoneNumber').val(),
        password: $('.create__password').val()
      },
      success: function (response) {
        $("#message").addClass("show");
        $("#message").html("Вы успешено зарегистровали!");
    
        setTimeout(() => {
          $("#message").removeClass("show");
          $("#message").html("");
        }, 4000);
        if (response != "") {
          $("#pid").val(response);
        }
      }
    });
  } else {
    $("#message").addClass("show");
    $("#message").html("Что то не так прошло!");

    setTimeout(() => {
      $("#message").removeClass("show");
      $("#message").html("");
    }, 4000);
  }
});

