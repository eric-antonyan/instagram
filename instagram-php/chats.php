<?php

require "pages/header.php";
require "php/functions.php";

session_start();

?>

<div class="chats__top-bar flex">
  <a href="./" class="back">
    <img src="icons/profile/inactive/arrow-left.svg" alt="">
  </a>
  <a href="" class="username">eric_antonyan</a>
  <a href="results">
    <img src="icons/bottom-bar/regular/pluse.svg" alt="">
  </a>
</div>

<div class="chat__users flex">
  <?php 

  $my_id = $_SESSION['userdata']['id'];

  $res = q("SELECT distinct incoming_id FROM `messages` WHERE incoming_id != $my_id ORDER BY `id`");
  
  
  
  while ($message = mysqli_fetch_assoc($res)) { 
    $user = getUser($message['incoming_id']);
    $res2 = q("SELECT *, LEFT(msg_txt, 30) AS `message` FROM `messages` WHERE incoming_id = ".$user['id']." AND outgoing_id = $my_id OR incoming_id = $my_id AND outgoing_id = ".$user['id']." ORDER BY `id` DESC LIMIT 1");

    
    while ($msg = mysqli_fetch_assoc($res2)) {
    ?>
    <a href="chat/<?= $user['uid'] ?>">
    <div class="user flex">
      <div class="left">
        <img class="chat__user-pic" src="users/<?= $user['pic'] ?>" alt="">
      </div>
      <div class="right flex">
        <p class="top usera"><?= $user['username'] ?></p>
        <p class="bottom">
          <?php 
          if (strlen($msg['message']) >= 30) {
            echo $msg['message'] . '...';
          } else {
            echo $msg['message'];
          }
          ?>
        </p>
      </div>
    </div>
  </a>
  <?php }
  }
  ?>
</div>