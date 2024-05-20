document.addEventListener("DOMContentLoaded", () => {
  const userPic = document.getElementById("user-pic");
  const userPicSource = document.querySelector("input");

  if (userPic && userPicSource) {
    userPic.onclick = () => {
      userPicSource.click();
    };
  }

  const fileInput = document.querySelector("input");

  fileInput.addEventListener("change", (event) => {
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = () => {
        const base64String = reader.result;
        userPic.src = base64String;
      };

      reader.onerror = (error) => {
        console.error("File reading error:", error);
      };
    }
  });
});