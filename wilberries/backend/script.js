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

const productPrice = document.querySelector(".product__price");

const att = productPrice.getAttribute("format");
let formattedNumber = att.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
productPrice.innerText = formattedNumber + " драм";
