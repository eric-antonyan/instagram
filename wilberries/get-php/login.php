<?php

session_start();

require_once "functions.php";
require_once "config.php";

$pid_or_login = $_POST['pid_or_login'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `user_id` = '$pid_or_login' AND `password` = '$password'";

$res = q($sql);

if (mysqli_num_rows($res) > 0) {
    echo 'success';
    $user = mysqli_fetch_assoc($res);
    $_SESSION['p_user'] = [
        'id' => $user['id'],
        'user_id' => $user['user_id'],
        'company_name' => $user['company_name'],
        'first_name' => $user['first_name'],
        'password' => $user['password'],
        'status' => $user['status']
    ];
} else {
    echo 'unsuccess';
}