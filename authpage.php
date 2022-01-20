<?php
require("connectdb.php");



$content = '
    <form method="POST" action="auth.php">
        <label>Логин</label>
        <input type="text" name="login">

        <label>Пароль</label>
        <input type="password" name="password">

        <label></label>
        <button type="submit">Войти</button> <a href="signup.php">Регистрация</a>
    </form>
';

require("template.php");

?>

