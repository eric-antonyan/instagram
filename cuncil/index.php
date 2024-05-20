<?php


session_start();

if (isset($_GET['page'])) {
    if ($_GET['page'] == "general") {
        include "general/index.html";
    } elseif ($_GET['page'] === "contact_us") {
        include "contact_us/index.php";
    } elseif ($_GET['page'] === "about_us") {
        include "about__us/index.html";
    } elseif ($_GET['page'] === "apanel") {
        include "apanel/true.php";
    } elseif ($_GET['page'] === "mpanel") {
        include "mayor/index.php";
    } else {
        include "404/index.php";
    }
} elseif (isset($_GET['apanel']) && isset($_SESSION['esuccess'])) {
    include "base/index.php";
} elseif (isset($_GET['mpanel']) && isset($_SESSION['msuccess'])) {
    include "mbase/index.php";
} else {
    header('location: ?page=general');
}
?>

