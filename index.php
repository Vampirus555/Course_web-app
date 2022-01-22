<?php
require("session.php");
$title = "Поиск активностей парка";

$content ='
        <div class="finder">
            <div class="container_header">
                <p style="margin: 5px;">Узнайте об активностях интересующего вас парка</p>
            </div>
';
if(isset($user) && $user != ""){
    $content .='
    <div class="container_header_info">
        <p>Теперь вам доступна вся информация</p>
    </div>
    ';
}else{
    $content .='
        <div class="container_header_info">
            <p>Для получения полной информации необходимо авторизоваться</p>
        </div>
    ';
}
$content .='
    <form action="info.php" method="POST" class="search-form">
        <input type="text" name="park" class="search-field" placeholder="Введите название парка...">
        <button class="search-btn" >Найти</button>
    </form>
</div>
';
          

require("template.php");
?>