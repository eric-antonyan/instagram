<?php
global $username;
global $user;

session_start();
?>
<?php
$user_id = $user['id'];
$userdata_id = $_SESSION['userdata']['id'];

$_SESSION['back_to_profile'] = '../' . $user['username'];
?>

<?= isset($_SESSION['filed']['username_defined']) ? $_SESSION['filed']['username_defined'] : '' ?>
<?php unset($_SESSION['filed']) ?>

<?php $is_blocked = q("SELECT * FROM `block` WHERE `from` = $userdata_id AND `to` = $user_id"); ?>
<?php $is_blockedViwer = q("SELECT * FROM `block` WHERE `from` = $user_id AND `to` = $userdata_id"); ?>
<div class="profile__header profile__container">
  <div class="back">
    <a href="<?= $_SESSION['prev_page_chat'] ?>">
      <img src="icons/profile/inactive/arrow-left.svg" alt="">
    </a>
  </div>
  <div class="username">
    <?php

    if (mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0) {
      if ($user['full_name'] == '') {
        echo $user['username'];
      } else {
        echo $user['full_name'];
      }
    } else {
      echo "Instagram User";
    }

    ?>
  </div>
  <div class="others">
    <img src="icons/post/inactive/vertical-dots.svg" id="userProfileMenuMoreBtn" alt="">
    <ul class="dropdown">
      <li class="reset-list dropdown-list list" onclick="getProfileURL()">Copy user URL</li>
      <input class=copy-url-query type="text" value="http://192.168.101.3/instagram/profile.php?id=<?= $user['uid'] ?>&ref=<?= getUser($_SESSION['userdata']['id'])['uid'] ?>" id="userUrl">
      <?= $user['id'] === $_SESSION['userdata']['id'] ? '<a href="' . $user['username'] . '/edit"><li class="reset-list dropdown-list list">Edit profile</li></a>' : '' ?>
      <?php
      if ($user['id'] !== $_SESSION['userdata']['id']) { ?>
        <a href="php/<?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? '' : 'un' ?>block.php?block=<?= $user['uid'] ?>"><li class="reset-list dropdown-list list"><?= mysqli_num_rows($is_blocked) == 0 ? '' : 'Un' ?>block</li></a>
      <?php }   ?>
      <?= $user['id'] !== $_SESSION['userdata']['id'] ? '<a href="chat/'.$user['uid'].'"><li class="reset-list dropdown-list list">Send message</li></a>' : '' ?>
      <?= $user['id'] === $_SESSION['userdata']['id'] ? '<a href="saves"><li class="reset-list dropdown-list list">Saved</li></a>' : '' ?>
      <?= $user['id'] === $_SESSION['userdata']['id'] ? '<a href="php/logout.php"><li class="reset-list dropdown-danger list">Logout</li></a>' : '' ?>
      <?= $user['id'] === $_SESSION['userdata']['id'] ? '<a href="settings"><li class="reset-list dropdown-list list">Settings</li></a>' : '' ?>
    </ul>
  </div>
</div>
<?php
?>
<main>
  <div class="profile__details profile__container">
    <h3 class="full__name"></h3>
    <img class="profile__image" src="users/<?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? $user['pic'] : 'default.png' ?>" alt="">
    <p class="username"><?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? $user['username'] : '' ?></p>
    <?php

    if ($user['bio'] != '') { ?>
      <div class="p" role="description">
        <?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? $user['bio'] : 'No bio' ?>
      </div>
    <?php }

    ?>
  </div>
  <?php

  $follower_id = $_SESSION['userdata']['id'];
  $followed_id = getUserByUserame($user['username'])['id'];
  $is_followed = q("SELECT * FROM `followers` WHERE follower_id = $follower_id AND followed_id = $followed_id");



  if (mysqli_num_rows($is_blocked) == 0) {
    if ($user['id'] !== $_SESSION['userdata']['id']) { ?>
      <div class="follow-un-container">
        <?php
        if (mysqli_num_rows($is_followed) == 0) { ?>
          <a href="php/follow.php?id=<?= $user['uid'] ?>">
            <button class="btn follow">Follow</button>
          </a>
        <?php } else { ?>
          <a href="php/unfollow.php?id=<?= $user['uid'] ?>">
            <button class="btn follow">Unfollow</button>
          </a>
        <?php }
        ?>
      </div>
    <?php }
  } else { ?>
    <div class="follow-un-container">
      <a href="php/unblock.php?block=<?= $user['uid'] ?>">
        <button class="btn follow">Unblock</button>
      </a>
    </div>
  <?php } ?>
  <?php

  $fol_id = $user['id'];

  $fr_get = q("SELECT COUNT(*) AS followers FROM `followers` WHERE followed_id = $fol_id");
  $fr_fol = mysqli_fetch_assoc($fr_get);

  $fd_get = q("SELECT COUNT(*) AS followeds FROM `followers` WHERE follower_id = $fol_id");
  $fd_fol = mysqli_fetch_assoc($fd_get);

  $pst_q = q("SELECT COUNT(*) AS posts_count FROM `posts` WHERE uid = $fol_id");
  $pst = mysqli_fetch_assoc($pst_q);

  ?>
  <div class="information__followers w-100 flex w-100">
    <a href="" class="posts__counters border w-100 tac flex flex-column">
      <span class="#posts"><?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? $pst['posts_count'] : 0 ?></span>
      <p>posts</p>
    </a>
    <a href="<?= $user['username'] ?>/followers" class="followers__count border w-100 tac flex flex-column">
      <span class=""><?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? $fr_fol['followers'] : 0 ?></span>
      <p>followers</p>
    </a>
    <a href="<?= $user['username'] ?>/following" class="followed__counts border w-100 tac flex flex-column">
      <span class=""><?= mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0 ? $fd_fol['followeds'] : 0 ?></span>
      <p>following</p>
    </a>
  </div>
  <div class="profile__posts" id="posts">
    <?php
    $uid = $user['id'];
    $posts = q("SELECT * FROM `posts` WHERE uid = $uid");
    if (mysqli_num_rows($is_blocked) === 0 && mysqli_num_rows($is_blockedViwer) === 0) {
      while ($post = mysqli_fetch_assoc($posts)) { ?>
        <a href="p/<?= $post['pid'] ?>">
          <img class="profile__post flex" src="posts/<?= $post['pic'] ?>" alt="">
        </a>
    <?php }
    }
    ?>
  </div>
</main>
<script>
  function getProfileURL() {
    // Get the value from the input field
    const txt = document.querySelector('#userUrl');

    txt.select();

    document.execCommand('copy')
  }
</script>