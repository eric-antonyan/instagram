<?php

session_start();

if ($_SESSION['user-reg']['username'] == NULL && $_SESSION['user-reg']['password'] == NULL) {
  header('location: ?username');
}

?>

<form class="success login-form" action="./" method="post">
  <h2 class="header-text success__text">Welcome to Instagram, <?= $_SESSION['uname'] ?></h2>
  <p class="second__text">You can update info anytime in Setting, or enter new info now</p>
  <br>
  <a class="login__button pointer" href="./index.html">
    <button class="login__button">Complate Sign Up</button>
  </a>
</form>