function adjustElementHeight() {
  const element = document.querySelector(".phone");
  const vh = window.innerHeight; 
  element.style.setProperty("--vh", `${vh}px`);
}

setInterval(adjustElementHeight, 1);
