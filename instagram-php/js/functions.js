function follow(id) {
  $.ajax({
    type: "post",
    url: "user/follow",
    data: {
      followed_id: 4,
    },
    success: function (response) {
      this.innerHTML = response;
    },
  });
}

function dropdown(dropdown) {
  document.querySelector(`${dropdown}`).classList.toggle("show");
}

const postLike = (id, elem) => {
  if (elem.classList.contains("unlike")) {
    $.ajax({
      type: "post",
      url: "../php/like.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.src = "../icons/post/active/like.svg";
          elem.classList.add("like");
          elem.classList.remove("unlike");
        } else {
          alert("Something wrong...");
        }
      },
    });
  } else {
    $.ajax({
      type: "post",
      url: "../php/unlike.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.src = "../icons/post/inactive/like.svg";
          elem.classList.remove("like");
          elem.classList.add("unlike");
        } else {
          alert("Something wrong...");
        }
      },
    });
  }
};

const postFav = (id, elem) => {
  if (elem.classList.contains("add-fav")) {
    $.ajax({
      type: "post",
      url: "../php/save.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.classList.remove("add-fav");
          elem.classList.add("rem-fav");
          elem.src = "../icons/post/active/fav.svg";
        } else {
          alert("Something wrong...");
        }
      },
    });
  } else {
    $.ajax({
      type: "post",
      url: "../php/unsave.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.classList.add("add-fav");
          elem.classList.remove("rem-fav");
          elem.src = "../icons/post/inactive/favorite.svg";
        } else {
          alert("Something wrong...");
        }
      },
    });
  }
};
