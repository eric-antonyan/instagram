<?php 

require "config.php";

session_start();

global $db;

$bcode = $_GET['barcode'];

$output = '';

$sql = "SELECT * FROM `products` WHERE barcode = $bcode";
$result = mysqli_query($db, $sql);

$product = mysqli_fetch_assoc($result);

$output .= '

<tr>
<td>'.$product['barcode'].'</td>
<td>'.$product['product_name'].'</td>
<td>'.$product['product_price'].'</td>
</tr>

';

echo $output;