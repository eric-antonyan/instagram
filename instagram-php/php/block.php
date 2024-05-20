<?php 

session_start();

require "connect.php";
require "functions.php";

if (isset($_GET['block'])) {
  $from = $_SESSION['userdata']['id'];
  $to = getUserByUid($_GET['block'])['id'];
  q("INSERT INTO `block` (`from`, `to`) VALUES ($from, $to)");
  header('location: ../'.getUserByUid($_GET['block'])['username'].'');

  echo $from;
  echo $to;
  echo $connection->error;
}