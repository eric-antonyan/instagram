<?php 

require_once "connect.php";
require_once "functions.php";

session_start();

if (isset($_GET['block'])) {
  $from = $_SESSION['userdata']['id'];
  $to = getUserByUid($_GET['block'])['id'];
  q("DELETE FROM `block` WHERE `from` = $from AND `to` = $to");
  echo $to;
  echo $from;
  header('location: ../'.getUserByUid($_GET['block'])['username'].'');
}