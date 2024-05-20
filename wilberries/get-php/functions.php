<?php

require_once "config.php";

function q($sql) {
    global $db;
    return mysqli_query($db, $sql);
}

function g_user($id) {
    return mysqli_fetch_assoc(q("SELECT * FROM `users` WHERE id = $id"));
}

function g_product($id) {
    return mysqli_fetch_assoc(q("SELECT * FROM `products` WHERE id = $id"));
}

function get_curr_date($date) {
    $datetime = date_create($date);
    $month = date('m', strtotime($date));
    $day = date('d', strtotime($date));
    $dateSys = date('Y-m-d');
    $sysDay = date('d', strtotime($dateSys));
    $days = date_format($datetime, 'd');

    if ($day == $sysDay) {
        return "сегодня";
    } else if ($day == $sysDay - 1) {
        echo "до завтра";
    } else if ($day == $sysDay + 1) {
        return "послезавтра";
    }

    if ($month == 1) {
        return "январь " . $days;
    } elseif ($month == 2) {
        return "февраль " . $days;
    } elseif ($month == 3) {
        return "март " . $days;
    } elseif ($month == 4) {
        return "апрель " . $days;
    } elseif ($month == 5) {
        return "май " . $days;
    } elseif ($month == 6) {
        return "июнь " . $days;
    } elseif ($month == 7) {
        return "июль " . $days;
    } elseif ($month == 8) {
        return "август " . $days;
    } elseif ($month == 9) {
        return "сентябрь " . $days;
    } elseif ($month == 10) {
        return "октябрь " . $days;
    } elseif ($month == 11) {
        return "ноябрь " . $days;
    } elseif ($month == 12) {
        return "декабрь " . $days;
    }
}