<?php

if (isset($_SESSION['p_user'])) { ?>
    <div class="page__top">
        <img src="https://queue-it.com/media/ppcp1twv/product-drop.jpg" alt="">
    </div>
<?php }

?>
<header class="admin__header">
    <a href="../">
        <div class="arrow-left">
            <i class="fa fa-arrow-left"></i>
        </div>
    </a>
    <div class="logo">
        <img src="https://pngimg.com/uploads/wildberries/wildberries_PNG6.png" alt="">
    </div>
    <?php
    if (isset($_SESSION['p_user'])) { ?>
        <div class="bars">
            <i class="fa fa-bars"></i>
            <ul status="hide" class="nav-lists">
                <li class="nav-list">Добавить товар</li>
                <li class="nav-list">Управление товаров</li>
                <li class="nav-list">Рудактировать профиль</li>
                li
            </ul>
        </div>

    <?php } else { ?>
        <div class="home">
            <a href="../"><i class="fa fa-home"></i></a>
        </div>
    <?php }
    ?>
</header>