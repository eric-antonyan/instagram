<?php 

require_once "php/connect.php";
require_once "php/functions.php";

session_start();

if (isset($_GET['id']) && $_GET['ref'] == getUser($_SESSION['userdata']['id'])['uid']) {
  header('location: ./'.getUserByUid($_GET['id'])['username'].'');
}