<?php

require "db.php";

function q($sql_syntax)
{
    global $db;
    return mysqli_query($db, $sql_syntax);
}

function show_time($date)
{
    $timestamp = strtotime($date);

    $strTime = array("վայրկյան", "րոպե", "ժամ", "օր", "ամիս", "տարի");
    $length = array("60", "60", "24", "30", "12", "10");

    $currentTime = time();
    if ($currentTime >= $timestamp) {
        $diff     = time() - $timestamp;
        for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return $diff . " " . $strTime[$i] . " առաջ ";
    }
}
