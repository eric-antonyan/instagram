const imgs = document.querySelectorAll("img");

function infinite() {
  imgs.forEach((img) => {
    img.addEventListener("contextmenu", function (e) {
      e.preventDefault();
    });

    // Disable dragging of the image
    img.addEventListener("dragstart", function (e) {
      e.preventDefault();
    });

    // Disable image click
    img.addEventListener("click", function (e) {
      e.preventDefault();
    });

    console.log(img);
  });
}

setTimeout(infinite, 100);
