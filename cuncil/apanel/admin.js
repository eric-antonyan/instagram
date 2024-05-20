// const username = document.querySelector("#username");
// const password = document.querySelector("#password");

// $("#loginForm").on("submit", function(e) {
//     e.preventDefault();
//     if (username.value === "" || password.value === "") {
//         alert("Լրացրեք բոլոր տողերը");
//     } else {
//         $.ajax({
//             type: "post",
//             url: "get-php/login.php",
//             data: {
//                 username: username.value,
//                 password: password.value,
//             },
//             success: function (response) {
//                 alert("Դուք հաջջողությամբ գրանցվեցիք");
//                 window.location = "?apanel";
//             }
//         });
//     }
// })