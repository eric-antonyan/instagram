<?php

$res = q("SELECT * FROM `posts` ORDER BY `id` DESC");



?>


<?= isset($_SESSION['post_deleted']) ? $_SESSION['post_deleted'] : '' ?>
<?php unset($_SESSION['post_deleted']) ?>

<main class="main">
  <section id="followedUsersContainer" class="users">

  </section>
  <section class="posts">
    <?php
    if (mysqli_num_rows($res) > 0) {
      while ($post = mysqli_fetch_assoc($res)) {
        $pid = $post['id'];
        $uid = $_SESSION['userdata']['id'];
        $is_liked = q("SELECT * FROM `likes` WHERE `pid` = $pid AND `uid` = $uid");
        $is_fav = q("SELECT * FROM `favorites` WHERE `pid` = $pid AND `uid` = $uid");
    ?>
        <div class="post">
          <div class="top">
            <div class="left">
              <div class="user-picture">
                <img class="user__image" src="users/<?= getUser($post['uid'])['pic'] ?>" alt="">
              </div>
              <a class="post__username" href="<?= getUser($post['uid'])['username'] ?>"><?= getUser($post['uid'])['username'] ?></a>
            </div>
            <div class="right">
              <img src="icons/post/inactive/vertical-dots.svg" alt="" id="postMore<?= $post['pid'] ?>">
              <ul class="dropdown" id="dp<?= $post['pid'] ?>" dropdown="">
                <li class="reset-list dropdown-list list" onclick="getPostURL<?= $post['pid'] ?>()">Copy post URL</li>
                <input class=copy-url-query type="text" value="http://192.168.101.3/instagram/p/<?= $post['pid'] ?>" id="postUrl<?= $post['pid'] ?>">
                <?= $post['uid'] === $_SESSION['userdata']['id'] ? '<li class="reset-list dropdown-danger list"><a href="php/delpost.php?pid=' . $post['pid'] . '">Delete Post</a></li>' : '' ?>
              </ul>
              <script>
                document.addEventListener('DOMContentLoaded', () => {
                  const postMore<?= $post['pid'] ?> = document.getElementById('postMore<?= $post['pid'] ?>');

                  const userProfileMenuDropDown<?= $post['pid'] ?> = document.querySelector('#dp<?= $post['pid'] ?>');

                  if (postMore<?= $post['pid'] ?> && userProfileMenuDropDown<?= $post['pid'] ?>) {
                    postMore<?= $post['pid'] ?>.onclick = () => {
                      userProfileMenuDropDown<?= $post['pid'] ?>.classList.toggle('show');
                    }
                  }
                })
              </script>
              <script>
                function getPostURL<?= $post['pid'] ?>() {
                  // Get the value from the input field
                  const postUrl<?= $post['pid'] ?> = document.querySelector('#postUrl<?= $post['pid'] ?>');

                  postUrl<?= $post['pid'] ?>.select();

                  document.execCommand('copy')
                }
              </script>
            </div>
          </div>
          <div class="main">
            <img class="post__image" src="posts/<?= $post['pic'] ?>">
          </div>
          <div class="bottom">
            <ul class="post__controls">
              <li class="reset-list">
                <img onclick="like(<?= $post['id'] ?>, this)" class="pointer <?= mysqli_num_rows($is_liked) == 0 ? 'unlike' : 'like' ?>" src="./icons/post/<?= mysqli_num_rows($is_liked) == 0 ? 'in' : '' ?>active/like.svg" alt="">
              </li>
              <li class="reset-list">
                <a target="_blank" href="c/<?= $post['pid'] ?>">
                  <img class="pointer" src="./icons/post/inactive/comment.svg" alt="">
                </a>
              </li>
              <li class="reset-list">
                <a href="share?post=http://192.168.101.3/instagram/p/<?= $post['pid'] ?>">
                  <img class="pointer" src="./icons/post/inactive/paper_air.svg" alt="">
                </a>
              </li>
            </ul>
            <div class="favorite">
              <img onclick="fav(<?= $post['id'] ?>, this)" class="pointer <?= mysqli_num_rows($is_fav) == 0 ? 'rem-fav' : 'add-fav' ?>" src="icons/post/<?= mysqli_num_rows($is_fav) == 0 ? 'in' : '' ?>active/fav<?= mysqli_num_rows($is_fav) == 0 ? 'orite' : '' ?>.svg" alt="">
            </div>
            <script src="js/fav.js"></script>
          </div>
          <div class="information">
            <span class="likes-count" id="count_likes<?= $post['pid'] ?>"></span>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
              setInterval(function() {
                $.ajax({
                  type: "post",
                  url: "php/getLikes.php",
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
                <a href="#" class="post__username"><?= getUser($post['uid'])['username'] ?></a>
                <span post_descr class="post__description">
                  <?= $post['post_text'] ?>
                </span>
              </div>
              <div class="about__comments">
                <span class="fonts-12">View all</span> <span>1,567 comments</span>
              </div>
              <div class="about__date">
                <span class="fonts-12"><?= showTime($post['created_at']) ?></span> <span class="circle"></span> <span class="fonts-12">Suggested for you</span>
              </div>
            </div>
          </div>
        </div>
      <?php }
    } else { ?>
      <h2 class="no__media-text">There are no posts</h2>
    <?php }
    ?>
  </section>
</main>