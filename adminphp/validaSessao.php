<?php
session_start();
$urlDefault = $_SERVER['DOCUMENT_ROOT'];


$urlLogin = $urlDefault.'login?status=203';
if(!isset($_SESSION['LOGIN'])){
    logout();
}


function logout($isFromErro=false){
    $status = $isFromErro ? "status?402" : "";
    $_SESSION['PERFIL']=0;
    $_SESSION['LOGIN'] = FALSE;
    session_start();
    session_destroy();
    header('Location: ../login.php'.$status);
    die();
}
?>
