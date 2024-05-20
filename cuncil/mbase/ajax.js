setInterval(function() {
    $.ajax({
        type: "post",
        url: "./get-php/getEData.php",
        success: function (response) {
            $("#messages").html(response);
        }
    });
}, 1000)