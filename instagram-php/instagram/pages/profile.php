<?php
global $username;
global $user;
?>

<div class="profile__header profile__container">
  <div class="back">
    <img src="icons/profile/inactive/arrow-left.svg" alt="">
  </div>
  <div class="username">
    <?= $user['full_name'] == '' ? $user['username'] : $user['full_name'];  ?>
  </div>
  <div class="others">
    <img src="icons/post/inactive/vertical-dots.svg" onclick="dropdown('.dropdown');" alt="">
    <ul class="dropdown">
      <li class="reset-list dropdown-list list">Copy user URL</li>
      <li class="reset-list dropdown-list list">edit profile</li>
      <li class="reset-list dropdown-danger list">Block</li>
      <li class="reset-list dropdown-list list">Send message</li>
    </ul>
  </div>
</div>
<div class="profile__details profile__container">
  <h3 class="full__name"></h3>
  <img class="profile__image" src="users/default.png" alt="">
  <p class="username"><?= $user['username'] ?></p>
  <?= $user['bio'] == '' ? '<br>' : '<div class="p" role="description">
       '.$user['bio'].'
  </div>' ?>
</div>
<div class="information__followers w-100 flex w-100">
  <div class="posts__counters border w-100 tac flex flex-column">
    <span class="">10</span>
    <p>posts</p>
  </div>
  <div class="followers__count border w-100 tac flex flex-column">
    <span class="">10</span>
    <p>followers</p>
  </div>
  <div class="followed__counts border w-100 tac flex flex-column">
    <span class="">10</span>
    <p>following</p>
  </div>
</div>