<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="top__header">
            <div class="header__transparent"></div>
            <div class="information">
                <p>Пункт выдачи <i class="fa-solid fa-angle-right"></i></p>
                <div class="city">
                    <p>Ташир лорейская область ул․ Джаукян</p>
                </div>
            </div>
            <div class="notification">
                <i class="far fa-bell"></i>
            </div>
        </div>
        <div class="header__bottom">
            <div class="search__bar">
                <div class="search__left">
                    <div class="search__icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="search__input">
                        <input type="text" placeholder="Найти на Wildberries" />
                    </div>
                </div>
                <div class="search__right">
                    <div class="search__microphone">
                        <i class="fa fa-microphone"></i>
                    </div>
                    <div class="search__camera">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="basket main">
        <?php
        session_start();

        if (isset($_SESSION['p_user'])) { ?>
            <div class="basketSumTable">
                <?php
                $curr_user = $_SESSION['p_user']['id'];
                require "../get-php/functions.php";

                $res = q("SELECT SUM(price) as total FROM `basket` WHERE pid=$curr_user");
                $run = mysqli_fetch_assoc($res);
                $count = mysqli_fetch_assoc(q("SELECT COUNT(*) as count FROM `basket` WHERE pid=$curr_user"));

                ?>
                <p>К оформлению</p>
                <small>
                    <p><?= $count['count'] ?> шт., <span format="<?= $run['total'] ?>" class="product__price"></span></p>
                </small>
            </div>
            <?php
            $sql = "SELECT * FROM `basket` WHERE `pid` = $curr_user";
            $run = q($sql);
            while ($basket = mysqli_fetch_assoc($run)) {
                $product = g_product($basket['product_id']);
                $basket_uid = g_user($product['pid']);
            ?>
                <div class="product">
                    <a style="text-decoration: none; color: #000;" href="../?product=<?= $product['id'] ?>">
                        <img class="product_image__basket" src="../a/uploads/<?= $product['images'] ?>" alt="">
                    </a>
                    <div class="right">
                        <p format="<?= $product['price'] ?>" class="product__price bold"></p>
                        <p>IPhone 13 Max Pro</p>
                        <p class="bold"><?= $basket_uid['company_name'] ?></p>
                        <p><span>Доставка</span> <span class="bold"><?= get_curr_date($product['order']) ?></span>
                            <br>
                            <a href="../get-php/actions.php?del_p=<?= $product['id'] ?>">
                                <button class="remove<?= $product['id'] ?>">Удалить</button>
                            </a>
                        </p>

                        <style>
                            .remove<?= $product['id'] ?> {
                                height: 35px;
                            }
                        </style>
                    </div>
                </div>
        <?php }
        }
        ?>


    </div>
    <div class="footer">
        <a href="../">
            <div class="home__icon">
                <i class="fa fa-home"></i>
            </div>
        </a>
        <div class="search__icon">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="shopping-cart__icon active">
            <i class="fa fa-shopping-cart"></i>
            <span class="box__count">4</span>
        </div>
        <a href="../a/">
            <div class="user-circle__icon">
                <i class="fa-regular fa-circle-user"></i>
            </div>
        </a>
    </div>

    <script src="../backend/basket.js"></script>
</body>

</html>