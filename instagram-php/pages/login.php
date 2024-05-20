<form class="login-form" id="form" action="?assdasd" method="post">
  <h1 class="header-text">
    <img width="160px" src="icons/top-bar/logo.svg" alt="">
  </h1>
  <div class="input-group">
    <input name="uname" class="login-input" type="text" id="username" placeholder="Username">
    <img class="user__status" src="icons/login/check.png" alt="">
  </div>
  <br>
  <div class="input-group">
    <input name="password" class="login-input" type="password" id="password" placeholder="Password">
    <img class="user__status" src="icons/login/check.png" alt="">
  </div>
  <p class="status incorrect-text"></p>
  <br>
  <button disabled id="next" class="login__button pointer">Log in</button>
  <br>
  <p><span>Don't have account?</span> <a href="./register">Sign Up</a></p>
</form>