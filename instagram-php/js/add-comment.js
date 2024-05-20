const addCommentText = document.getElementById('addCommentText');

const add = (id) => {
  if (addCommentText.value === '') {
    addCommentText.focus();
  } else {
    $.ajax({
      type: "post",
      url: "../php/add-comment.php",
      data: {
        comment: addCommentText.value,
        pid: id,
      },
      success: function (response) {
        addCommentText.value = '';
      }
    });
  }
}