<?php

require "config.php";

function q($query) {
    global $connection;

    return mysqli_query($connection, $query);
}