<?php 

session_start();

require_once 'connect.php';

if (isset($_GET['username'])) {
  $username = $_POST['uname'];
  echo $username;
  $_SESSION['user-reg']['username'] = $username;
  header('location: ../register?password');
}

if (isset($_GET['password'])) {
  $password = $_POST['password'];
  $username = $_SESSION['user-reg']['username'];
  $uid = bin2hex(random_bytes(10));
  $_SESSION['user-reg']['password'] = $username;
  $sql = "INSERT INTO `users` (`uid`, `username`, `password`) VALUES ('$uid', '$username', '$password')";
  mysqli_query($connection, $sql);
  header('location: ../register?welcome');
}