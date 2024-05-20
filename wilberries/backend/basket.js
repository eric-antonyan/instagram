const siteBody = document.body;
const siteHeight = window.innerHeight;

siteBody.style.setProperty("--screen-height", siteHeight + "px");

const phone = document.querySelector(".phone");
setInterval(() => {
  siteBody.style.setProperty("--phone-height", siteHeight + "px");
}, 100);

const productPrice = document.querySelectorAll(".product__price");

productPrice.forEach(function (param) {
  let att = param.getAttribute("format");
  var formattedNumber = att.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
  param.innerText = formattedNumber + " драм";
});
