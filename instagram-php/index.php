<?php

session_start();

require_once "php/functions.php";



if (!isset($_SESSION['userdata'])) {
  echo "Something Wrong...";
  header('location: ./login');
} else if (isset($_SESSION['userdata']) && $_GET['username']) {
  $username = $_GET['username'];
  $user = getUserByUserame($username);
  if ($_GET['username'] == $user['username']) {
    $_SESSION['prev_page'] = '../' . $username;
    showPage('header');
    showPage('profile');
    showPage('footer');
    showPage('bottom-links');
  } else if ($_GET['username'] && isset($_GET['following'])) {
    showPage('following');
    echo 1;
  } else {
    showPage('404');
  }
} else if (isset($_SESSION['userdata']) && isset($_GET['following'])) {
  showPage('header');
  showPage('following');
} else if (isset($_SESSION['userdata']) && isset($_GET['followers'])) {
  showPage('header');
  showPage('followers');
} else if (isset($_SESSION['userdata']) && isset($_GET['editprofile'])) {
  showPage('header');
  showPage('edit-profile');
} else {
  $_SESSION['prev_page'] = '../';
  $_SESSION['prev_post'] = '../';
  $_SESSION['prev_page_chat'] = './';
  showPage('header');
  showPage('nav');
  showPage('wall');
  showPage('footer');
  showPage('bottom-links');
}
