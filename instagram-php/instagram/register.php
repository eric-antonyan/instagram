<?php

session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/normalize.css">
  <title>Document</title>
</head>

<body>
  <div class="phone">
    <div class="login">
      <?php

      if (isset($_GET['username']) && !isset($_GET['password'])) {
        require_once 'pages/reg-username.php';
      } elseif (isset($_GET['password']) && !isset($_GET['username'])) {
        require_once 'pages/reg-password.php';
      } elseif (isset($_GET['welcome'])) {
        require_once 'pages/reg-welcome.php';
      } else {
        header('location: ?username');
      }
      ?>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/register.min.js"></script>
</body>

</html>