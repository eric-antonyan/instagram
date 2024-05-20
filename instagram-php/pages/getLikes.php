<?php 

require_once "connect.php";
require_once "functions.php";

$pid = $_POST['pid'];

echo getLikes($pid);