<?php

require_once "db.php";
require_once "functions.php";


$name = $_POST['name'];
$mail = $_POST['email'];
$message = $_POST['message'];

$_sql = "INSERT INTO `id` (`name`, `email`, `message`) VALUES ('$name', '$mail', '$message')";
$_res = q($_sql);

if ($_res) {
    echo "Դուք հաջողույամբ ուղղարկեցիք նամակը";
} else {
    echo "Ուփս։ Ինչ որ բան սխալ է";
}