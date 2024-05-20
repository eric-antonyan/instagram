<main class="admin__main">
    <h2 class="login__header">Регистрация</h2>
    <form class="login__form" id="submitForm" method="post" action="../../get-php/reg.php">
        <input name="company_name" class="company_name" placeholder="Имя компании">
        <input name="first_name" class="creator_name" placeholder="Ваше имя">
        <div class="floating_input">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Flag_of_Armenia_%281918%E2%80%931922%29.svg/200px-Flag_of_Armenia_%281918%E2%80%931922%29.svg.png" alt="">
            <input name="phone" id="phoneNumber" class="phone" type="text" inputmode="numeric" placeholder="Ваше номер [37400000000]">
        </div>
        <input name="password" class="create__password" autocomplete="off" placeholder="Создате пароль">
        <input class="confirm__password" autocomplete="off" placeholder="Подвердите пароль">
        <input status="hidden" id="pid" disabled type="text" placeholder="Ваше PID после регистрация">
        <div class="message" id="message"></div>
        <button class="submit__form">Регистрация</button>
    </form>
    <p class="registration">У вас есть аккаунт? <a href="../">авторизация</a></a>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="script.js"></script>