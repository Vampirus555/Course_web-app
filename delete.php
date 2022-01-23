<?php
require("connectdb.php");
require("session.php");

mysqli_query($connect, "DELETE FROM notes WHERE user_id = ".$_SESSION["user_id"]." ");
        
header("Location: notes.php");

?>