// Show/Hide Login Form

$("#openLoginWindowBtn").on("click", function () {
    $(".loginWindow").addClass("show");
    setTimeout(function () {
        $(".loginWindow .wrapper").addClass("show");
    }, 200)
})

$("#closeLoginWindowBtn").on("click", function () {
    $(".loginWindow .wrapper").removeClass("show");
    setTimeout(function () {
        $(".loginWindow").removeClass("show");
    }, 200)
})

// Show/Hide Register Form Of Click

$("#showCreateAccountWindowBtn").on("click", function () {
    $(".registerWindow").addClass("show");
    setTimeout(function () {
        $(".registerWindow .wrapper").addClass("show");
    }, 200)

    $(".loginWindow .wrapper").removeClass("show");
    setTimeout(function () {
        $(".loginWindow").removeClass("show");
    }, 200)
})

$("#closeRegisterWindowBtn").on("click", function () {
    $(".registerWindow .wrapper").removeClass("show");
    setTimeout(function () {
        $(".registerWindow").removeClass("show");
    }, 200)
})

// Show/Hide Login Form Of Click

$("#showAlreadyAccountWindowBtn").on("click", function () {
    $(".loginWindow").addClass("show");
    setTimeout(function () {
        $(".loginWindow .wrapper").addClass("show");
    }, 200)

    $(".registerWindow .wrapper").removeClass("show");
    setTimeout(function () {
        $(".registerWindow").removeClass("show");
    }, 200)
})

// Set user

$("#newComment").on("submit", (event) => {
    event.preventDefault();
    $("#commentText").val("");
})

// Change image form

$("#changeStartImage").on("click", function () {
    document.getElementById("changeImageForm").click();
})

const changeStartImage = document.querySelector("#changeStartImage img");
const changeImageForm = document.querySelector("#changeImageForm");

changeImageForm.addEventListener('change', function() {
    var fileInput = this.files[0]; // Get the selected file

    if (fileInput) {
        var reader = new FileReader();

        reader.onload = function(event) {
            // Set the src attribute of the image tag to the file content
            var imgPreview = document.getElementById('previewImage');
            changeStartImage.src = event.target.result;
        };

        // Read file as data URL (for image preview)
        reader.readAsDataURL(fileInput);
    }
});