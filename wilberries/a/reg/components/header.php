<header class="admin__header">
    <div class="arrow-left">
        <i class="fa fa-arrow-left"></i>
    </div>
    <div class="logo">
        <img src="https://pngimg.com/uploads/wildberries/wildberries_PNG6.png" alt="">
    </div>
    <?php
    if (isset($_SESSION['p_user'])) { ?>
        <div class="bars">
            <i class="fa fa-bars"></i>
        </div>
    <?php } else { ?>
        <div class="home">
            <a href="../"><i class="fa fa-home"></i></a>
        </div>
    <?php }
    ?>
</header>