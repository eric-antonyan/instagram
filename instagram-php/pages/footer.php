<?php 

require_once "./php/functions.php";

?>

<footer class="bottom-bar">
  <ul class="bottom-bar-lists">
    <li class="bottom-bar-list reset-list"><a href="./"><img src="icons/bottom-bar/regular/home.svg" alt=""></a></li>
    <li class="bottom-bar-list reset-list"><a href="./results"><img src="icons/bottom-bar/regular/search.svg" alt=""></a></li>
    <li class="bottom-bar-list reset-list"><a href="new/post"><img src="icons/bottom-bar/regular/pluse.svg" alt=""></a></li>
    <li class="bottom-bar-list reset-list"><a href="#reels"><img src="icons/bottom-bar/regular/reels.svg" alt=""></a></li>
    <li class="bottom-bar-list reset-list"><a href="./<?= getUser($_SESSION['userdata']['id'])['username'] ?>"><img class="user__image" src="users/<?= getUser($_SESSION['userdata']['id'])['pic'] ?>" alt=""></a></li>
  </ul>
</footer>