<?php

session_start();

require_once 'connect.php';
require_once 'functions.php';

if (isset($_GET['username'])) {
  $username = $_POST['uname'];
  $res = q("SELECT * FROM `users` WHERE username = '$username'");
  if (mysqli_num_rows($res) == 0) {
    echo $username;
    $_SESSION['user-reg']['username'] = $username;
    header('location: ../register?password');
  } else {
    header('location: ../register');
    echo 'false';
  }
}

if (isset($_GET['password'])) {
  $password = $_POST['password'];
  $username = $_SESSION['user-reg']['username'];
  $uid = bin2hex(random_bytes(10));
  $_SESSION['user-reg']['password'] = $username;
  $sql = "INSERT INTO `users` (`uid`, `username`, `password`) VALUES ('$uid', LOWER('$username'), '$password')";
  mysqli_query($connection, $sql);
  echo $connection->error;
  header('location: ../register?welcome');
  echo $_SESSION['user-reg']['password'];
}
