<?php
require("connectdb.php");
require("session.php");


if (!empty($_POST)){
    mysqli_query($connect, "INSERT INTO users (name, login, password) VALUES (
        \"".$_POST["name"]. "\"  , 
        \"".$_POST["login"]."\",
        \"".md5($_POST["password"])."\"
        )"
       
    );
    
    
    header("Location: main.php");
}



$title = "Регистрация";
$content = '
<div class="auth">
<div class="auth_header">
    Регистрация
</div>
<form method="POST">
    <div class="margin_5">
        <input type="text" name="name" placeholder="Имя">
    </div>
    
    <div class="margin_5">
        <input type="text" name="login" placeholder="Логин">
    </div>

    
    <div class="margin_5">
        <input type="password" name="password" placeholder="Пароль">
    </div>

    
    <div class="margin_5">
        <button type="submit">Регистрация</button>
    </div>
</div>
';

require("template.php");

?>
<!-- <form method=\"POST\">
    <div>
        <label>ФИО</label>
        <input type=\"text\" name=\"name\">
    </div>
    
    <div>
        <label>Логин</label>
        <input type=\"text\" name=\"login\">
    </div>
    
    <div>
        <label>Пароль</label>
        <input type=\"password\" name=\"password\">
    </div>
    
    <div>
        <button type=\"submit\">Регистрация</button>
    </div>
</form> -->