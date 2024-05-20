<?php

require "php/connect.php";

session_start();

?>

<main>
  <div class="profile__posts">
    <?php
    $uid = $_SESSION['userdata']['id'];

    $sql = "SELECT pid AS pids FROM `favorites` WHERE `uid` = $uid";

    $query = mysqli_query($connection, $sql);

    while ($posts = mysqli_fetch_assoc($query)) {
      $query2 = mysqli_query($connection, "SELECT * FROM `posts` WHERE id = " . $posts['pids'] . "");
      while ($post = mysqli_fetch_assoc($query2)) {
    ?>
        <a href="p/<?= $post['pid'] ?>">
          <img class="profile__post" width="100%" src="posts/<?= $post['pic'] ?>" alt="">
        </a>
    <?php }
    }
    ?>
  </div>
</main>