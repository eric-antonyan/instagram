const msgText = document.querySelector('#msgText');

const addMsg = (id) => {
  if (msgText.value === '') {
    msgText.focus();
  } else {
    $.ajax({
      type: "post",
      url: "../php/add-msg.php",
      data: {
        muid: id,
        msg: msgText.value
      },
      success: function (response) {
        msgText.value = '';
      }
    });
  }
}