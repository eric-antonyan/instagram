<?php


require "pages/header.php";
require "php/functions.php";
require "php/connect.php";

session_start();

$uid = $_GET['user'];

$user = mysqli_fetch_assoc(q("SELECT * FROM `users` WHERE `uid` = '$uid'"));

$_SESSION['prev_page_chat'] = 'chat/'.$user['uid'].'';



$_SESSION['prev_page'] = '../chat/'.$user['uid'].'';
$share = '';

if (isset($_SESSION['share'])) {
  $share = $_SESSION['share'];
}



?>

<div class="profile__header profile__container">
  <div class="back">
    <a href="../chats">
      <img src="../icons/profile/inactive/arrow-left.svg" alt="">
    </a>
  </div>
  <a class="username" href="../<?= $user['username'] ?>"><?= $user['username'] ?></a>
  <div class="others">
    <img src="../users/<?= $user['pic'] ?>" class="user__image" alt="">
  </div>
</div>
<main>
  <div class="messages flex"></div>
</main>
<div class="add__comment flex">
  <img class="set__comment__user-pic" width="40" src="../users/<?= getUser($_SESSION['userdata']['id'])['pic'] ?>" alt="">
  <input id="msgText" class="add__comment-text" value="<?= $share ?>" placeholder="Add message for <?= $user['username'] ?>" type="text">
  <button id="autoClick" onclick="addMsg(<?= $user['id'] ?>)" class="add__comment-button flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
    </svg>
  </button>
</div>
<script src="https://3921bf45-2499-41ba-a683-6e4a895940f9-00-8j7jivyfdxoe.picard.replit.dev/viewport.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/add-msg.js"></script>

<script>
  function infinite() {
    $.ajax({
      type: "post",
      url: "../php/getMsgs.php",
      data: {
        incoming_id: <?= $user['id'] ?>
      },
      success: function (response) {
        $(".messages").html(response);
      }
    });
  }

  setInterval(infinite, 100);

  <?= isset($_SESSION['share']) ? '$("#autoClick").click();' : '' ?>
</script>
<?php unset($_SESSION['share']); ?>