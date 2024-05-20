<?php 

require "connect.php";
require "functions.php";

session_start();

$pid = $_POST['pid'];

echo getLikes($pid);