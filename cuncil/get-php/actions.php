<?php

require_once "functions.php";
require_once "db.php";

if (isset($_GET['dmessage'])) {
    $_sql = "DELETE FROM `id` WHERE id='".$_GET['dmessage']."'";
    q($_sql);
    echo $_sql;
    header("location: .././?apanel");
}

if (isset($_GET['pmessage'])) {
    $_sql = "UPDATE `id` SET `view_status_secretary`=1 WHERE id='".$_GET['pmessage']."'";
    q($_sql);
    echo $_sql;
    header("location: .././?apanel");
}

if (isset($_GET['unmessage'])) {
    $_sql = "UPDATE `id` SET `view_status_secretary`=0 WHERE id='".$_GET['unmessage']."'";
    q($_sql);
    echo $_sql;
    header("location: .././?apanel");
}

if (isset($_GET['m_dmessage'])) {
    $_sql = "UPDATE `id` SET `view_status_secretary`=0 WHERE id='".$_GET['m_dmessage']."'";
    q($_sql);
    echo $_sql;
    header("location: .././?mpanel");
}