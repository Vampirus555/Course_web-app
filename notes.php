<?php
require("connectdb.php");
require("session.php");

$result = mysqli_query($connect, "SELECT * FROM notes WHERE user_id =  ".$_SESSION["user_id"]." ");


if (!empty($_POST)){
    mysqli_query($connect, "INSERT INTO notes (parkName, content, user_id) VALUES (
        \"".$_POST["parkName"]. "\"  , 
        \"".$_POST["content"]."\",
        \"".$_SESSION["user_id"]."\"
        )"
       
    );
    
    
    header("Location: notes.php");
}

while($notes = mysqli_fetch_assoc($result)){
    $content1 .='
        <tr>
            <td>'.$notes['parkName'].'</td>
            <td>'.$notes['content'].'</td>
        </tr>
    ';
}

$title = "Мои заметки";

$content = '
<div class="info">
    <div style="display:flex; align-items: center; justify-content: center;">
        <div class="card">
            <form method="POST">
                <div>
                    
                    <input type="text" name="parkName" placeholder="Название парка">
                </div>
                
                <div>
                    <textarea name="content" placeholder="Поле для заметок"> </textarea>
                </div>
                
                <div>
                    <button type="submit" name="push">Добавить заметку</button>
                </div>
            </form>
        </div>
        <div class="park_card">
            <div class="park_header">Мои заметки</div>
            <table>
                '.$content1.'
            </table>
        </div>
    </div>
</div>
';




require("template.php");

?>
