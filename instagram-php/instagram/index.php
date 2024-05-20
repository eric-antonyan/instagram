<?php 

session_start();

require_once "php/functions.php";



if (!isset($_SESSION['userdata'])) {
  echo "Something Wrong...";
  header('location: ./login');
} else if (isset($_SESSION['userdata']) && $_GET['username']) {
  showPage('header');
  $username = $_GET['username'];
  $user = getUserByUserame($username);
  showPage('profile');
  showPage('bottom-links');
} else {
  showPage('header');
  showPage('nav');
  showPage('wall');
  showPage('footer');
  showPage('bottom-links');
}