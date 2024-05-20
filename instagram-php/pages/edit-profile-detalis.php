<?php 
session_start();
require 'php/functions.php';
?>

<div class="edit__profile">
  <form action="../php/edit-profile.php" enctype="multipart/form-data" method="post">
    <div class="information">
      <div class="pic__container">
      <img src="../users/<?= getUser($_SESSION['userdata']['id'])['pic'] ?>" alt="" class="user__picture" id="user-pic">
      <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="pic_source" id="user-pic-source" value="<?= getUser($_SESSION['userdata']['id'])['pic'] ?>">
      </div>
      <div class="inputs-group">
        <div class="floating__label">
          <input id="nameAndSurname" name="name_surname" class="edit__profile-input" value="<?= getUser($_SESSION['userdata']['id'])['full_name'] ?>" placeholder="" type="text">
          <label for="nameAndSurname">Enter yout new Name and Surname</label>
        </div>
        <div class="floating__label">
          <input disabled id="username" class="edit__profile-input" placeholder="" value="<?= getUser($_SESSION['userdata']['id'])['username'] ?>" type="text" name="username">
          <label for="username">Choose your username</label>
        </div>
        <div class="floating__label">
          <input id="bio" class="edit__profile-input" placeholder="" type="text" name="bio" value="<?= getUser($_SESSION['userdata']['id'])['bio'] ?>">
          <label for="bio">Bio text</label>
        </div>
        <button name="update" class="btn">Update Data</button>
      </div>
    </div>
  </form>
</div>
<script src="../js/user.pic.js"></script>