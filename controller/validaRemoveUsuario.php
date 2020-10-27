<?php

session_start();
require_once('../adminphp/conecta.php');

$is_valido = 1;
$user_name = mysqli_real_escape_string($conexao , $_SESSION['NOME']);
$senha_user = mysqli_real_escape_string($conexao , md5($_POST['pass_user']));
$id_logado = $_SESSION['ID'];


$query_banco = "SELECT users.NOME, users.SENHA from users 
                where users.NOME = '$user_name' and users.SENHA = '$senha_user' and users.ID =  $id_logado
                limit 1";

$valida_usuario_senha = mysqli_query($conexao, $query_banco);
$resultado_validacao = mysqli_fetch_array($valida_usuario_senha, MYSQLI_ASSOC);


if($resultado_validacao){        
    $is_valido = 1;
}
else{
    $is_valido = 0;        
}

echo $is_valido;

?>