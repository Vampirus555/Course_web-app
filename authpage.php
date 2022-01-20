<?php
require("connectdb.php");

$title = "Авторизация";

$content = '
<div class="auth">
    <div class="auth_header">
        Авторизация
    </div>
    <form method="POST" action="auth.php" >
        <div class="margin_5">
            <input type="text" name="login" placeholder="Логин">
        </div>



        <div class="margin_5">
            <input type="password" name="password" placeholder="Пароль">
        </div>

        
        <button type="submit">Войти</button> 
        
    </form>
    <form action="signup.php" class="margin_5">
        <button type="submit">Регистрация</button>
    </form>
</div>
';

require("template.php");

?>

