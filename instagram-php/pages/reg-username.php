<form class="login-form" id="username" action="php/login.php?username" method="post">
  <h1 class="header-text">Choose username</h1>
  <p class="second__text">You can always chage it later</p>
  <div class="input-group">
    <input name="uname" class="login-input" type="text" id="username" placeholder="Username">
    <img class="user__status" src="icons/login/check.png" alt="">
  </div>
  <p class="status incorrect-text">Sorry, but this usernaem existed</p>
  <button disabled id="next" class="login__button pointer">Next</button>
</form>