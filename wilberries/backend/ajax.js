function getData() {
  $.ajax({
    type: "get",
    url: "get-php/get_products.php",
    success: function (response) {
      $(".products__wrapper").html(response);
      console.log(response);

      const productPrice = document.querySelectorAll(".product__price");

      productPrice.forEach(function (param) {
        let att = param.getAttribute("price");
        var formattedNumber = att
          .toString()
          .replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        param.innerText = formattedNumber + " драм";
      });
    },
  });
}

setInterval(getData, 700);

const siteBody = document.body;
const siteHeight = window.innerHeight;

siteBody.style.setProperty("--screen-height", siteHeight + "px");

const phone = document.querySelector(".phone");
setInterval(() => {
  const phoneHeight = phone.offsetHeight;
  siteBody.style.setProperty("--phone-height", phoneHeight + "px");
  const phoneWidth = phone.offsetWidth;
  siteBody.style.setProperty("--phone-width", phoneWidth + "px");
}, 100);
