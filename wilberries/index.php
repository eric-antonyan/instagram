<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#6305b1" />
  <link rel="stylesheet" href="styles/app.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Document</title>
</head>

<body>
  <div class="phone">
    <div class="wildberries">
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
      <?php
      require "get-php/config.php";
      require "get-php/functions.php";

      if (!$_GET['product']) { ?>
        <main class="main">
          <div class="get-product__container">
            <div class="get-product__wrapper">
              <div class="get-product__left">
                <p class="header-get__product">QR-код для достовок</p>
                <p class="description-get__product">
                  Покажите QR-код сотрудники или назовите ФИО и код
                </p>
              </div>
              <div class="get-product_right">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/QR_Code_example.png" alt="" class="qr-code-container" />
                <p class="description-qr__code_get__product">Поделиться</p>
              </div>
            </div>
          </div>
          <div class="products__container">
            <div class="products__header">
              <p>Подробно для вас</p>
            </div>
            <div class="products__wrapper">
            </div>
          </div>
        </main>
      <?php } else {
        $row = mysqli_fetch_assoc(q("SELECT * FROM `products` WHERE id=" . $_GET['product'] . ""));
      ?>
        <main class="main">
          <div class="products__container">
            <img class="product_image__by_link" src="a/uploads/<?= $row['images'] ?>" alt="">
            <div class="product__bottom">
              <p class="product__description link"><?= $row['description'] ?></p>
              <p format="<?= $row['price'] ?>" class="product__price link"></p>
              <a href="get-php/actions.php?add=<?= $row['id'] ?>">
                <button>Добавить в корзину <i class="fa fa-shopping-cart"></i></button>
              </a>
            </div>
          </div>
        </main>
      <?php }
      ?>
      <div class="footer">
        <div class="home__icon active">
          <i class="fa fa-home"></i>
        </div>
        <div class="search__icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <a style="color: #9e9dab;" href="basket/">
          <div class="shopping-cart__icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="box__count">4</span>
          </div>
        </a>
        <a href="a/">
          <div class="user-circle__icon">
            <i class="fa-regular fa-circle-user"></i>
          </div>
        </a>
      </div>
    </div>
  </div>

  <?php

  if (!$_GET['product']) { ?>
    <script src="backend/ajax.js"></script>
  <?php } else { ?>
    <script src="backend/script.js"></script>
  <?php } ?>
</body>

</html>