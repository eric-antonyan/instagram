<?php 

session_start();

$_SESSION['share'] = $_GET['post'];

header("location: chats");