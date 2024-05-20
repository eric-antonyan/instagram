<div class="home__container">
    <form class="add_product__form" method="post" enctype="multipart/form-data" id="add_product" action="../get-php/add_product.php">
        <input name="price" id="price" placeholder="price" type="text">
        <input name="desc" id="desc" placeholder="description" type="text">
        <input type="date" name="order" id="order">
        <input accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" type="file" name="image" id="">
        <div class="message 
        <?php 
        if ($_GET['success'] == 'true' || $_GET['success'] == 'false') {
            echo "show";
        } else {
            echo "";
        }
        ?>
        " id="message">
            <?php 
            if ($_GET['success'] === "true") {
                echo "Товар успешено добавлено";
            } elseif ($_GET['success'] == "false") {
                echo "Заполните все поле";
            }
            ?>
        </div>
        <button>Add Product</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/wilberries/a/script.js"></script>