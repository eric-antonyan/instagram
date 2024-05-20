<?php

session_start();

require_once "functions.php";
require_once "config.php";

$orderOld = $_POST['order'];

$date = date('Y-m-d', strtotime($orderOld));


$price = $_POST['price'];
$description = $_POST['desc'];
$order = $date;
$image = $_FILES['image'];

$image_name = $image['name'];
$image_tmp_location = $image['tmp_name'];

$current_image_name = time() . "-" . $image_name;

if (!empty($price) && !empty($description) && !empty($image)) {
    move_uploaded_file($image_tmp_location, "../a/uploads/" . $current_image_name);
    $sql = "INSERT INTO `products` (`pid`, `price`, `description`, `images`, `order`) VALUES ('" . $_SESSION['p_user']['id'] . "', '$price', '$description', '$current_image_name', '$orderOld')";
    $res = q($sql);
    header("location: ../a?success=true");
} else {
    header("location: ../a?success=false");
}
