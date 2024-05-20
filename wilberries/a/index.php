<?php

session_start();

?>

<?php

if (!isset($_SESSION['p_user'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php require_once "components/head.php" ?>

    <body>
        <?php require_once "components/header.php" ?>
        <?php require_once "components/main.php" ?>
    </body>

    </html>
<?php } else { ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php require_once "components/head.php" ?>

    <body class="a_body">
        <?php require_once "components/header.php" ?>
        <?php require_once "components/home.php" ?>
    </body>

    </html>
<?php } ?>