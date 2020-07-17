<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');

echo $_POST["nome"];
echo $_POST["disciplina"];
echo $_POST["tipo"];
echo $_POST["quantidade"];
echo $_POST["frenteverso"];
// echo $_POST["file"];

//QUERY que será executada no bando de dados

// $query = "INSERT INTO users (users.CPF,users.NOME,users.EMAIL,users.SENHA,users.PERFIL_ID) VALUES ($cpf,'$nome','$email','$senha',$perfil)";
// $select =  mysqli_query($conexao,$query);

//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

//



?>