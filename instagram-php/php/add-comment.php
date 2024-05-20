<?php 

require "connect.php";
require "functions.php";

session_start();

$comment = $_POST['comment'];
$uid = $_SESSION['userdata']['id'];
$pid = $_POST['pid'];
$insert = q("INSERT INTO `comments` (`pid`, `uid`, `comment_text`) VALUES ($pid, $uid, '$comment')");