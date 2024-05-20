<?php

require "functions.php";

if (isset($_GET['setuser'])) {
    $uname = $_POST['reg_username'];
    $reg_fname = $_POST['reg_fname'];
    $pswd = $_POST['reg_password'];
    $picture = $_FILES;
    $picture_name = $_FILES['picture']['name'];
    $picture_tmp = $_FILES['picture']['tmp_name'];

    echo var_dump($picture);

    $rand_hash = random_bytes(2);
    $uid = bin2hex($rand_hash);

    $c_a_sql = "INSERT INTO `users` (`uid`, `full_name`, `password`, `picture`) VALUES ('$uid', '$reg_fname', '$pswd', '$picture_name')";
    
    $c_a_res = q($c_a_sql);

    if ($c_a_res) {
        echo "okay";
    } else {
        echo "err";
    }
}