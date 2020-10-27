<?php
session_start();
require_once('../adminphp/conecta.php');

$urlRedirect = "../consultar_usuarios.php?status=";
$status = "200";

$id_remover = $_GET['id_remocao'];
$query_remove_usuario = "UPDATE users SET users.STATUS_USER = 2 WHERE users.ID = $id_remover";
$remove_usuario = mysqli_query($conexao, $query_remove_usuario);  
if($remove_usuario){        
}
else{    
    $status = "403";
}



header("Location: ".$urlRedirect.$status);
exit();



?>