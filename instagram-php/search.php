<?php

session_start();

if (isset($_SESSION['userdata'])) {

} else {
  header('location: ./login');
}

require_once "pages/header.php";
require_once "pages/search-nav.php";
require_once "pages/search.php";
require_once "pages/footer.php";
require_once "pages/bottom-links.php";