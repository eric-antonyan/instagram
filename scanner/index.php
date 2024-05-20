<?php 


session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/general.css">
  <title>Scanner App</title>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <h1 class="text-white tac">Scanner App</h1>
      <div id="form" class="form mt">
        <div class="input-wrapper">
          <input placeholder="" type="text" class="input border border-white bg-dark form-control" id="product-code">
          <label class="floating-label text-white cur-text" for="product-code">Enter product code</label>
        </div>
        <button name="submit" class="btn mt w-100 btn-height borr-10" id="submit" type="submit">SUBMIT</button>
        <a href="actions/requests/clear"><button name="submit" class="btn mt w-100 btn-height borr-10" id="submit" type="submit">CLEAR</button></a>
      </div>
      <ul class="product-container mt"></ul>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>