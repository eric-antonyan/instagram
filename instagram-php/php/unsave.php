<?php 

require "connect.php";
require "functions.php";

session_start();

$pid = $_POST['pid'];
$uid = $_SESSION['userdata']['id'];

$delete = q("DELETE FROM `favorites` WHERE `pid` = $pid AND `uid` = $uid");

if ($delete) {
  echo "true";
} else {
  echo "false";
}