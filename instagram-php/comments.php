<?php

require "php/functions.php";
require "php/connect.php";

$pid = $_GET['pid'];

session_start();

if (!isset($_SESSION['userdata'])) {
  header('location: ../login');
}

$post = mysqli_fetch_assoc(q("SELECT * FROM `posts` WHERE pid = '$pid'"));
showPage('header');

if ($pid === $post['pid']) {
  $user = getUser($post['uid']);
?>
  <div class="profile__header profile__container">
    <div class="back">
      <a href="<?= $_SESSION['prev_post'] ?>">
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
<?php }
require "pages/comments.php";
require "pages/add-comment.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://3921bf45-2499-41ba-a683-6e4a895940f9-00-8j7jivyfdxoe.picard.replit.dev/viewport.min.js"></script>
<script src="../js/add-comment.js"></script>
<script>
  function infinte() {
    $.ajax({
      type: "post",
      url: "../php/getComments.php",
      data: {
        pid: '<?= $_GET['pid'] ?>'
      },
      success: function(response) {
        $('.comments').html(response);
      }
    });
  }

  setInterval(infinte, 100);
</script>