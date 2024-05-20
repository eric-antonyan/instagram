const addPostSource = document.getElementById("post-image-source");
const prevImage = document.querySelector(".prev__image");

document.addEventListener('DOMContentLoaded', function() {
  addPostSource.onchange = (event) => {
    prevImage.removeAttribute("hidden");
  
    const file = event.target.files[0];
  
    if (file) {
      const reader = new FileReader();
      reader.readAsDataURL(file);
  
      reader.onload = () => {
        const base64String = reader.result;
        prevImage.src = base64String;
      };
  
      reader.onerror = (error) => {
        console.error("File reading error:", error);
      };
    }
  };
})
