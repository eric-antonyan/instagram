<?php 

require_once "connect.php";
require_once "functions.php";

session_start();

if (isset($_GET['id'])) {
  $follower_id = $_SESSION['userdata']['id'];
  $followed_id = getUserByUid($_GET['id'])['id'];
  q("INSERT INTO `followers` (`follower_id`, `followed_id`) VALUES ($follower_id, $followed_id)");
  echo $followed_id;
  echo $follower_id;
  header('location: ../'.getUserByUid($_GET['id'])['username'].'');
}