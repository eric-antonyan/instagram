const ajax = (url, method, data = {}) => {
  $.ajax({
    type: method,
    url: url,
    data: data,
    success: function(response) {
      html(".container", response);
    }
  });
}

const html = (element, text) => {
  $(element).html(text);
}



const scanner = new Html5QrcodeScanner("reader", {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 60,
});



scanner.render(success, error);

function success(result) {
  $("#barcode").val(result);
  $.ajax({
    type: 'post',
    url: `php/scan.php?barcode=${result}`,
    data: {
      barcode: $("#barcode").val(),
    },
    success: function(response) {
      
    }
  });
}

function error(result) {
  console.log(result);
}