<?php

require "connect.php";
require "functions.php";

session_start();

$pid = pidToId($_POST['pid']);

$res = q("SELECT * FROM `comments` WHERE pid = $pid");



while ($comment = mysqli_fetch_assoc($res)) {
  $cuser = getUser($comment['uid']);
?>
  <div class="comment flex">
    <div class="right">
      <img class="comment__user-pic" src="../users/<?= $cuser['pic'] ?>" alt="user image">
    </div>
    <div class="left">
      <div class="top flex">
        <p class="username"><?= $cuser['username'] ?></p>
        <span class="time"><?= showTime($comment['created_at']) ?></span>
      </div>
      <div class="bottom">
        <?= $comment['comment_text']  ?>
      </div>
    </div>
  </div>
<?php }

?>