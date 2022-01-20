<?php
session_start();
$user = (isset($_SESSION["login"])) ? $_SESSION["login"] : false;

?>