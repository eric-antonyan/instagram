<?php

require "db.php";
require "functions.php";

ini_set("session.gc_maxlifetime",720000); 
ini_set('session.gc_probability',1); 
ini_set('session.gc_divisor',1); 
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$_sql = "SELECT * FROM `mayor` WHERE username='$username' AND password='$password'";

$_res = q($_sql);

if (mysqli_num_rows($_res) > 0) {
    header("location: .././?mpanel");
    $_SESSION['msuccess'] = true;
    echo "ok";
} else {
    header("location: .././?page=mpanel");
}