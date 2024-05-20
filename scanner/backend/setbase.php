<?php 

require 'config.php';

class Base {
  public function add($barcode) {
    global $connection;
    $sql = "INSERT INTO `scan` (`id`, `name`, `barcode`, `price`) SELECT * FROM `products` WHERE barcode = $barcode";
    return mysqli_query($connection, $sql);
  }

  public function clear() {
    global $connection;
    $sql = "DELETE FROM `scan`";
    return mysqli_query($connection, $sql);
  }

  public function fetch($items) {
    global $connection;
    $sql = "SELECT * FROM `scan`";
    $res = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($res)) {
      return $row[$items];
    };
  }
}

$base = new Base;