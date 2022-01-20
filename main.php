<?php
require("session.php");
$title = "Поиск активностей парка";
$content ='
<div class="finder">
            <div class="container_header">
                <p>Узнайте об активностях интересующего вас парка.</p>
            </div>
            
                <form action="info.php" method="POST" class="search-form">
                    <input type="text" name="login" class="search-field" placeholder="Введите название парка...">
                    <button class="search-btn" >Найти</button>
                </form>
                
                
    
            
            
        </div>
';
require("template.php");
?>