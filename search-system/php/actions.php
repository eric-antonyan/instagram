<?php

require 'config.php';


global $connection;
$input = $_POST['input'];
$sql = "SELECT * FROM `search-catalog` WHERE search_text LIKE '$input%'";
$res = mysqli_query($connection, $sql);

if (mysqli_num_rows($res) > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
    echo '<li>'. $row['search_text'] .'</li>';
  }
} else {
  echo '<h2 style="text=">Query not defined</h2>';
}
