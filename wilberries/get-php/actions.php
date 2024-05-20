<?php 

session_start();

require "functions.php";
$curr_user = $_SESSION['p_user']['id'];
if ($_GET['add'] && isset($_SESSION['p_user'])) {
    $product_id = $_GET['add'];
    $product_price = g_product($_GET['add'])['price'];
    q("INSERT INTO `basket` (`pid`, `product_id`, `price`) VALUES ($curr_user, $product_id, $product_price)");
    echo $db->error;
    header('location: ../basket');
}

if ($_GET['del_p'] && isset($_SESSION['p_user'])) {
    $product_id = $_GET['del_p'];
    $product_price = g_product($_GET['add'])['price'];
    q("DELETE FROM `basket` WHERE product_id=$product_id");
    echo $db->error;
    header('location: ../basket');
}