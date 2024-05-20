function loop() {
  $.ajax({
    type: "post",
    url: "fetch/followers",
    success: function (response) {
      $("#followedUsersContainer").html(response);
    },
  });  
}

loop();