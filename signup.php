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
$content = "
<form method=\"POST\">
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
</form>
";

require("template.php");

?>