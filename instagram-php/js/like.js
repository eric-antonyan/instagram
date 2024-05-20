const like = (id, elem) => {
  if (elem.classList.contains("unlike")) {
    $.ajax({
      type: "post",
      url: "php/like.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.src = "./icons/post/active/like.svg";
          elem.classList.add("like");
          elem.classList.remove("unlike");
        } else {
          alert('Something wrong...');
        }
        console.log(response);
      },
    });
  } else {
    $.ajax({
      type: "post",
      url: "php/unlike.php",
      data: {
        pid: id,
      },
      success: function (response) {
        if (response === "true") {
          elem.src = "./icons/post/inactive/like.svg";
          elem.classList.remove("like");
          elem.classList.add("unlike");
        } else {
          alert('Something wrong...');
        }
      },
    });
  }
};
