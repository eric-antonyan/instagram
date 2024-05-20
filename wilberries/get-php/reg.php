<?php

require_once "functions.php";
require_once "config.php";

$random_bytes = random_bytes(3);
$token = bin2hex($random_bytes);
$token_status = "";

$company_name = $_POST['company_name'];
$first_name = $_POST['first_name'];
$phone = $_POST['phone'];
$password = $_POST['password'];


$sql = "INSERT INTO `users`(`user_id`, `company_name`, `first_name`, `phone`, `password`) VALUES ('$token','$company_name','$first_name','$phone','$password')";
$res = q($sql);

if ($res) {
    if ($token != '') {
        echo $token;
    }
}