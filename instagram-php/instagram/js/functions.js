function follow(id) {
  $.ajax({
    type: "post",
    url: "user/follow",
    data: {
      followed_id: 4
    },
    success: function (response) {
      this.innerHTML = response;
    }
  });
}

function dropdown(dropdown) {
  document.querySelector(`${dropdown}`).classList.toggle("show");
}