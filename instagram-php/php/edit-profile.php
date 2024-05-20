<?php

require 'connect.php';
require 'functions.php';

session_start();

if (isset($_POST['update']) && isset($_FILES['pic_source'])) {
  $username = $_POST['username'];
  $bio = $_POST['bio'];
  $full_name = $_POST['name_surname'];
  $uid = $_SESSION['userdata']['id'];
  $file = $_FILES['pic_source'];

  echo var_dump($file);

  $file_name = 'instagram-' . time() . $file['name'];
  $file_tmpname = $file['tmp_name'];
  $uploads_folder = '../users/';

  move_uploaded_file($file_tmpname, '../users/' . $file_name);

  $sql = "UPDATE `users` SET `bio` = '$bio', `full_name` = '$full_name', `pic` = '$file_name' WHERE id = $uid";

  $res = mysqli_query($connection, $sql);

  $query = q("SELECT * FROM `users` WHERE id = $uid");

  $user = mysqli_fetch_assoc($query);

  echo $connection->error;
  echo $connection->errno;

  $_SESSION['userdata']['id'] = $user['id'];
  $_SESSION['userdata']["username"] = $user['username'];
  $_SESSION['userdata']['bio'] = $user['bio'];
  $_SESSION['userdata']['full_name'] = $user['full_name'];
  $_SESSION['userdata']['pic'] = $user['pic'];

  echo var_dump($_SESSION['userdata']);

  header("location: ../" . $user['username'] . "");
}
