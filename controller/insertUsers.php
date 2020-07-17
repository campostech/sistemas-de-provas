<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');

$array = array('.','-','(',')');
// Recebe os parametros do formulário
$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$cpf = mysqli_real_escape_string($conexao,str_replace($array,'',$_POST['cpf']));
$email = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,md5($cpf));
$request_perfil = mysqli_real_escape_string($conexao,$_POST['perfil']);
$perfil = intval($request_perfil);
$big_int = intval($cpf);





//QUERY que será executada no bando de dados
$query = "INSERT INTO users (users.CPF,users.NOME,users.EMAIL,users.SENHA,users.PERFIL_ID) VALUES ($cpf,'$nome','$email','$senha',$perfil)";
$select =  mysqli_query($conexao,$query);
//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

//

// Verificando se adicionou
if($select){
    // Se adicionou redireciona para pagina com a mensagem da sucesso.
    $_SESSION['msg'] = "MSG04";
    header('Location: ../index.php');
    die();
}

?>