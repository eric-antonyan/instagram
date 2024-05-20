<?php

require "php/connect.php";

$uname = $_GET['followers'];

$q = q("SELECT * FROM `users` WHERE `username` = '$uname'");

if (mysqli_num_rows($q) == 0) {
  header('location: error');
}

$user = mysqli_fetch_assoc($q);

session_start();

?>



<div class="profile__header profile__container">
  <div class="back">
    <a href="<?= $_SESSION['back_to_profile'] ?>">
      <img src="../icons/profile/inactive/arrow-left.svg" alt="">
    </a>
  </div>
  <a class="username" href="../<?= $user['username'] ?>"><?= $user['username'] ?></a>
  <div class="others">
    <img src="../users/<?= $user['pic'] ?>" class="user__image" id="userProfileMenuMoreBtn" alt="">
    <ul class="dropdown">
      <li class="reset-list dropdown-list list" onclick="getProfileURL()">Copy user URL</li>
      <input class=copy-url-query type="text" value="http://192.168.101.3/instagram/profile.php?id=<?= $user['uid'] ?>&ref=<?= getUser($_SESSION['userdata']['id'])['uid'] ?>" id="userUrl">
      <?= $user['id'] === $_SESSION['userdata']['id'] ? '<li class="reset-list dropdown-list list"><a href="' . $user['username'] . '/edit">Edit profile</a></li>' : '' ?>
      <?php
      if ($user['id'] !== $_SESSION['userdata']['id']) { ?>
        <li class="reset-list dropdown-list list"><a href="php/<?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? '' : 'un' ?>block.php?block=<?= $user['uid'] ?>"><?= mysqli_num_rows($is_blocked) == 0 ? '' : 'Un' ?>block</a></li>
      <?php }   ?>
      <?= $user['id'] !== $_SESSION['userdata']['id'] ? '<li class="reset-list dropdown-list list">Send message</li>' : '' ?>
      <?= $user['id'] === $_SESSION['userdata']['id'] ? '<li class="reset-list dropdown-list list">Saved</li>' : '' ?>
    </ul>
  </div>
</div>
<div class="users">
  <?php
  $getFollowings = q("SELECT * FROM `followers` WHERE followed_id = " . $user['id'] . "");
  while ($fuser = mysqli_fetch_assoc($getFollowings)) { ?>
    <a href="../<?= getUser($fuser['follower_id'])['username'] ?>">
      <div class="user">
        <div class="left">
          <img src="../users/<?= getUser($fuser['follower_id'])['pic'] ?>" alt="" class="chat__user-pic">
        </div>
        <div class="right">
          <span class="top"><?= getUser($fuser['follower_id'])['full_name'] ?></span>
          <span class="bottom"><?= getUser($fuser['follower_id'])['username'] ?></span>
        </div>
      </div>
    </a>
  <?php }
  ?>
</div>