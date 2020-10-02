<?php
session_start();
if(!isset($_SESSION['LOGIN'])){
    header("Location: /login.php");
}


?>