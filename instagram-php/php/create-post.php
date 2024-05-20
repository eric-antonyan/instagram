<?php 

require_once "functions.php";
require_once "connect.php";

session_start();

$pic_source = $_FILES['pic_source'];
$post_text = $_POST['post_text'];
$uid = $_SESSION['userdata']['id'];

function alert($text) {
  echo '<script>alert('.$text.')</script>';
}

if (isset($_POST['submit']) && isset($pic_source)) {
  $file_name = 'INSTAGRAM_POST-' . time() . '-' . $pic_source['name'];
  $file_tmp = $pic_source['tmp_name'];
  $upload_loc = '../posts/';
  $pid = bin2hex(random_bytes(6));
  q("INSERT INTO `posts` (`pid`, `pic`, `post_text`, `uid`) VALUES ('$pid', '$file_name', '$post_text', $uid)");
  move_uploaded_file($file_tmp, $upload_loc . $file_name);
  header('location: ../new/post');
  $_SESSION['success']['addpost'] = '
  <div class="top welcome" id="timing">
  You added post successfully
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const welcome = document.querySelector(".welcome");

    welcome.classList.add("show");

    setTimeout(function() {
      welcome.classList.remove("show");
    }, 2000)
  })
</script>
  
  ';
}