<main class="admin__main">
    <h2 class="login__header">Авторизация</h2>
    <form method="post" class="login__form" action="../get-php/login.php">
        <input id="loginOrPid" name="pid_or_login" class="login" type="text" placeholder="Логин или PID">
        <input id="password" name="password" class="password" type="" autocomplete="off" placeholder="Пароль">
        <div class="message" id="message"></div>
        <button class="submit__form">Авторизация</button>
    </form>
    <p class="registration">Если нет аккаунта <?= $_SESSION['p_user']['id'] ?> <a href="reg">зарегиструйтесь</a></a>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/wilberries/a/script.js"></script>