const fav = (id, elem) => {
  if (elem.classList.contains("add-fav")) {
    $.ajax({
      type: "post",
      url: "php/save.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.classList.remove("add-fav");
          elem.classList.add("rem-fav");
          elem.src = "icons/post/active/fav.svg";
        } else {
          alert("Something wrong...");
        }
      },
    });
  } else {
    $.ajax({
      type: "post",
      url: "php/unsave.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.classList.add("add-fav");
          elem.classList.remove("rem-fav");
          elem.src = "icons/post/inactive/favorite.svg";
        } else {
          alert("Something wrong...");
        }
      },
    });
  }
};
