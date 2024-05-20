<?php 

require_once "connect.php";

function showPage($page) {
  include 'pages/'.$page.'.php';
}

function getUserByUserame($username) {
  global $connection;
  $sql = "SELECT * FROM `users` WHERE username = '$username'";
  $res = mysqli_query($connection, $sql);

  return mysqli_fetch_assoc($res);
}