<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');
require_once('../adminphp/verificausuario.php');


// Recebe os parametros do formulário
$cpf_instrutor = $_SESSION['CPF'];
$cpf_aluno = mysqli_real_escape_string($conexao,$_POST['aluno']);
$data_aula = mysqli_real_escape_string($conexao,$_POST['data']);
$hora_inicio = mysqli_real_escape_string($conexao,$_POST['hora_inicio']);
$hora_fim = mysqli_real_escape_string($conexao,$_POST['hora_fim']);
$horario_inicio = explode(":",$hora_inicio);
$segundos_inicio = ($horario_inicio[0]*3600 + $horario_inicio[1]*60);
$horario_fim = explode(':',$hora_fim);
$segundos_fim=($horario_fim[0]*3600 + $horario_fim[1]*60);
$diferenca = $segundos_fim - $segundos_inicio;

$duracao_aula = 50 * 60;

$quantidade = intval($diferenca / $duracao_aula);








// //$quantidade = mysqli_real_escape_string($conexao,$_POST['QUANTIDADE']);
// //$restricao = mysqli_real_escape_string($conexao,$_POST['plataforms']);


//QUERY que será executada no bando de dados
$query = "INSERT INTO AULA_RUA (AULA_RUA.FK_INSTRUTOR_CPF,AULA_RUA.FK_USUARIO_CPF,AULA_RUA.DATA,AULA_RUA.HORA_INICIO,AULA_RUA.HORA_FIM,AULA_RUA.QUANTIDADE) VALUES ('$cpf_instrutor','$cpf_aluno','$data_aula','$hora_inicio','$hora_fim','$quantidade')";
$select =  mysqli_query($conexao,$query);
// //mysqli_query -> Envia a conexão e a query para execução
// // $select -> variavel com resultado da query 




// Verificando se adicionou
if($select){
    // Se adicionou redireciona para pagina com a mensagem da sucesso.
    $_SESSION['msg'] = "MSG04";
    header('Location: ../inicial_instrutor.php');
    die();
}

 ?>