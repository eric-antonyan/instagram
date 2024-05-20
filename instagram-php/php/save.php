<?php 

require "connect.php";
require "functions.php";

session_start();

$uid = $_SESSION['userdata']['id'];
$pid = $_POST['pid'];

$insert = q("INSERT INTO `favorites` (`pid`, `uid`) VALUES ($pid, $uid)");

if ($insert) {
  echo 'true';
} else {
  echo 'false';
}