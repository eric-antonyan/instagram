<?php

require_once 'functions.php';

$search_query = $_POST['search_query'];

$res = q("SELECT * FROM users WHERE `username` LIKE '%". $search_query ."%'");
if (mysqli_num_rows($res) > 0) {
  $output = '';
  while ($user = mysqli_fetch_assoc($res)) { ?>
    <a href="./<?= $user['username'] ?>">
      <div class="user">
        <div class="left">
          <img class="user__pic" src="users/<?= $user['pic'] ?>" alt="">
        </div>
        <div class="right">
          <p class="top"><?= $user['full_name'] == '' ? $user['username'] : $user['full_name'] ?></p>
          <p class="bottom"><?= $user['username'] ?></p>
        </div>
      </div>
    </a>
<?php
}

} else {
  echo $search_query . ' not found';
}
?>