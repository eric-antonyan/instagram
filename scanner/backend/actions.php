

<?php

require_once 'config.php';
require_once 'setbase.php';

session_start();

$igshitcode = bin2hex(random_bytes(5));



$code = $_GET['request'];


if ($_GET['request'] == 'add') {
    global $connection;
    $barcode = $_POST['barcode'];
    $base->add($barcode);

    
} else if ($_GET['request'] == 'clear') {
    $base->clear();
    header('location: ../..');
} elseif ($_GET['request'] == 'get') {
    $output = '';
    $sql = "SELECT * FROM `scan`";
    $res = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($res)) {
      $output .= '<li class="list">'.$row['name'].'</li>';
    };
    
    echo $output;
} else {
    echo "1";
}