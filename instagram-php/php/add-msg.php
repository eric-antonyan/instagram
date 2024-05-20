<?php

require "connect.php";
require "functions.php";

session_start();

$uid = $_SESSION['userdata']['id'];
$muid = $_POST['muid'];
$msg = $_POST['msg'];

$insert = q("INSERT INTO `messages` (`msg_txt`, `outgoing_id`, `incoming_id`) VALUES ('$msg', $uid, $muid)");

echo $connection->error;