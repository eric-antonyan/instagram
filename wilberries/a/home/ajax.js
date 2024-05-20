const price = document.getElementById("price");
const desc = document.getElementById("desc");
const order = document.getElementById("order");

$("#add_product").on("submit", function (e) {
  e.preventDefault();
  if (price.value !== "" && desc.value !== "" && order.value !== "") {
    $.ajax({
      type: "post",
      url: "../get-php/add_product.php",
      data: {
        orderOld: order.value,
        price: price.value,
        description: desc.value,
      },
      success: function (response) {
        
      },
    });
  } else {
  }
});