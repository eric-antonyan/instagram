<?php 

$connection = mysqli_connect('192.168.101.3', 'root', '', 'instagram');

if (!$connection) {
  $connection = mysqli_connect('192.168.101.3', 'root', '', 'instagram');
} else {
}