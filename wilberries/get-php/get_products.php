<?php

require_once "config.php";
require_once "functions.php";

$sql = "SELECT * FROM `products` ORDER BY `id`";
$run = q($sql);

while ($product = mysqli_fetch_assoc($run)) {
    $user = g_user($product['pid']);
    $date = get_curr_date($product['order']);
    echo '
    
    <a style="text-decoration: none;" href="?product='.$product['id'].'" class="product">
        <img
          src="a/uploads/'.$product['images'].'"
          alt=""
          class="product__image"
        />
        <div class="product__bottom">
            <p price="'.$product['price'].'" class="product__price"></p>
            <p class="product__company">'.$user['company_name'].'</p>
            <div class="stars">
                <img src="images/star.svg" alt="" class="star" />
                <p class="stars__count">4.5</p>
                <img src="images/dot.svg" alt="" />
                <p class="stars-people__count">1997 оценок</p>
            </div>
        <div class="about__order">
          <span class="order">Достовка</span>
          <span class="order__data">'.$date.'</span>
        </div>
    </div>
    </a>
    
    ';
}
