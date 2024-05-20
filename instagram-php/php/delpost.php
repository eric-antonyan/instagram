<?php 

require "functions.php";
require "connect.php";

$pid = $_GET['pid'];

q("DELETE FROM `posts` WHERE pid = '$pid'");
header('location: ../');