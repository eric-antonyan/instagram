<?php

require "php/functions.php";
require "php/connect.php";

$pid = $_GET['pid'];

session_start();

if (!isset($_SESSION['userdata'])) {
  header('location: ../login');
}

$_SESSION['prev_post'] = '../p/' . $pid;

$post = mysqli_fetch_assoc(q("SELECT * FROM `posts` WHERE pid = '$pid'"));
showPage('header');

if ($pid === $post['pid']) {

  $user = getUser($post['uid']);

  $pid = $post['id'];
  $uid = $_SESSION['userdata']['id'];
  $is_liked = q("SELECT * FROM `likes` WHERE `pid` = $pid AND `uid` = $uid");
  $is_fav = q("SELECT * FROM `favorites` WHERE `pid` = $pid AND `uid` = $uid");

?>
  <div class="profile__header profile__container">
    <div class="back">
      <a href="<?= $_SESSION['prev_page'] ?>">
        <img src="../icons/profile/inactive/arrow-left.svg" alt="">
      </a>
    </div>
    <a class="username" href="../<?= $user['username'] ?>"><?= $user['username'] ?></a>
    <div class="others">
      <img src="../users/<?= $user['pic'] ?>" class="user__image" alt="">
    </div>
  </div>
  <main>
    <div class="post">
      <div class="top">
        <div class="left">
          <div class="user-picture">
            <img class="user__image" src="../users/<?= $user['pic'] ?>" alt="">
          </div>
          <a class="post__username" href="eric_antonyan"><?= $user['username'] ?></a>
        </div>
        <div class="right">
          <img onclick="openDropdown()" src="../icons/post/inactive/vertical-dots.svg" alt="">
          <ul class="dropdown dp">
            <li onclick="copyUrl()" class="reset-list dropdown-list list">Copy post URL</li>
            <input id="url" class="copy-url-query" value="http://192.168.101.3/instagram/p/<?= $post['pid'] ?>" type="text">
            <?= $post['uid'] === $_SESSION['userdata']['id'] ? '<li class="reset-list dropdown-danger list"><a href="php/delpost.php?pid=' . $post['pid'] . '">Delete Post</a></li>' : '' ?>
          </ul>
          <script>
            const url = document.getElementById('url');
            const dp = document.querySelector('.dp');

            const copyUrl = () => {
              url.select();
              document.execCommand("copy");
            }

            const openDropdown = () => {
              dp.classList.toggle('show');
            }

            console.log(url);
          </script>
        </div>
      </div>
      <div class="main">
        <img id="postImg" class="post__image" src="../posts/<?= $post['pic'] ?>">
      </div>
      <div class="bottom">
        <ul class="post__controls">
          <li class="reset-list">
            <img onclick="postLike(<?= $post['id'] ?>, this)" class="pointer <?= mysqli_num_rows($is_liked) == 0 ? 'unlike' : 'like' ?>" src="../icons/post/<?= mysqli_num_rows($is_liked) == 0 ? 'in' : '' ?>active/like.svg" alt="">
          </li>
          <li class="reset-list">
            <a target="_blank" href="../c/<?= $post['pid'] ?>">
              <img class="pointer" src="../icons/post/inactive/comment.svg" alt="">
            </a>
          </li>
          <li class="reset-list">
            <img class="pointer" src="../icons/post/inactive/paper_air.svg" alt="">
          </li>
        </ul>
        <div class="favorite">
          <img class="pointer <?= mysqli_num_rows($is_fav) == 0 ? 'rem-fav' : 'add-fav' ?>" onclick="postFav(<?= $post['id'] ?>, this)" <?= mysqli_num_rows($is_fav) == 0 ? 'in' : '' ?> src="../icons/post/<?= mysqli_num_rows($is_fav) == 0 ? 'in' : '' ?>active/fav<?= mysqli_num_rows($is_fav) == 0 ? 'orite' : '' ?>.svg" alt="">
        </div>
      </div>
      <div class="information">
        <span class="likes-count" id="count_likes<?= $post['pid'] ?>"></span>
        <script>
          setInterval(function() {
            $.ajax({
              type: "post",
              url: "../php/getLikes.php",
              data: {
                pid: <?= $post['id'] ?>
              },
              success: function(response) {
                $("#count_likes<?= $post['pid'] ?>").html(response + ' likes');
              }
            });
          }, 100)
        </script>
        <div class="about__post">
          <div class="username">
            <a href="#" class="post__username"><?= $user['username'] ?></a>
            <span post_descr="" class="post__description">
              <?= $post['post_text'] ?>
            </span>
          </div>
          <div class="about__comments">
            <span class="fonts-12">View all</span> <span>1,567 likes</span>
          </div>
          <div class="about__date">
            <span class="fonts-12"><?= showTime($post['created_at']) ?> </span> <span class="circle"></span> <span class="fonts-12">Suggested for you</span>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php } else {
  header('location: ../');
  $_SESSION['post_deleted'] = "<div class='post-alert'>
  The post has been removed!
</div>
<script>
  setTimeout(() => {
    document.querySelector('.post-alert').classList.add('hide');
  }, 3000)
</script>";
}

require "pages/post.footer.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://3921bf45-2499-41ba-a683-6e4a895940f9-00-8j7jivyfdxoe.picard.replit.dev/viewport.min.js"></script>
<script src="../js/functions.js"></script>