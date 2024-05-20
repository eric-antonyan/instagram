<?php 

session_start();

if (isset($_SESSION['success']['addpost'])) {
  echo $_SESSION['success']['addpost'];
}

unset($_SESSION['success']['addpost']);

?>
<form action="../php/create-post.php" method="post" enctype="multipart/form-data">
  <div class="add-post">
    <img src="../users/" class="prev__image" hidden alt="">
    <input type="file" accept="image/jpeg, image/jpg, image/png, image/gif" class="post-image-source" name="pic_source" id="post-image-source" alt="">
    <div class="floating__label mt">
      <input type="text" id="text" class="add__post-input" name="post_text" placeholder="">
      <label for="text">Say something...</label>
    </div>
    <button name="submit" class="addpost-btn btn">Publish</button>
  </div>
</form>