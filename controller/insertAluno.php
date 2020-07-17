<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');

$array = array('.','-','(',')');
// Recebe os parametros do formulário
$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$cpf = mysqli_real_escape_string($conexao,str_replace($array,'',$_POST['cpf']));
$rg = mysqli_real_escape_string($conexao,str_replace($array,'',$_POST['rg']));
$nome_mae = mysqli_real_escape_string($conexao,$_POST['nome_mae']);
$nome_pai = mysqli_real_escape_string($conexao,$_POST['nome_pai']);
$naturalidade = mysqli_real_escape_string($conexao,$_POST['naturalidade']);
$tel = mysqli_real_escape_string($conexao,str_replace($array,'',$_POST['tel']));
$celular = mysqli_real_escape_string($conexao,str_replace($array,'',$_POST['celular']));
$data_nasc = mysqli_real_escape_string($conexao,$_POST['data_nasc']);
$sexo = mysqli_real_escape_string($conexao,$_POST['sexo']);
$categoria = mysqli_real_escape_string($conexao,$_POST['categoria']);
$inscricao = mysqli_real_escape_string($conexao,$_POST['inscricao']);
$rua = mysqli_real_escape_string($conexao,$_POST['rua']);
$numero = mysqli_real_escape_string($conexao,$_POST['numero']);
$bairro = mysqli_real_escape_string($conexao,$_POST['bairro']);
$cidade = mysqli_real_escape_string($conexao,$_POST['cidade']);
$estado = mysqli_real_escape_string($conexao,$_POST['estado']);
$cep = mysqli_real_escape_string($conexao,str_replace('-','',$_POST['cep']));
$email = mysqli_real_escape_string($conexao,$_POST['email']);
// $senha = md5($cpf);

// echo  $nome;
// echo $cpf;
// echo $rg;
// echo $nome_mae;
// echo $nome_pai;
// echo $naturalidade;
// echo $tel;
// echo $celular;
// echo $data_nasc;
// echo $sexo;
// echo $categoria;
// echo $inscricao;
// echo $rua;
// echo $numero;
// echo $bairro;
// echo $cidade;
// echo $estado;
echo $cep;
// echo $email;
// echo $senha;





//$quantidade = mysqli_real_escape_string($conexao,$_POST['QUANTIDADE']);
//$restricao = mysqli_real_escape_string($conexao,$_POST['plataforms']);


//QUERY que será executada no bando de dados
$query = "INSERT INTO USUARIO (USUARIO.CPF,USUARIO.RG,USUARIO.NOME,USUARIO.NOME_MAE,USUARIO.NOME_PAI,USUARIO.NATURALIDADE,USUARIO.TELEFONE,USUARIO.CELULAR,USUARIO.DATA_NASC,USUARIO.SEXO,USUARIO.CATEGORIA,USUARIO.INSCRICAO,USUARIO.EMAIL,USUARIO.SENHA) VALUES ('$cpf','$rg','$nome','$nome_mae','$nome_pai','$naturalidade','$tel','$celular','$data_nasc','$sexo','$categoria','$inscricao','$email','$senha')";
$select =  mysqli_query($conexao,$query);
//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

$query = "INSERT INTO ENDERECO (ENDERECO.FK_USUARIO_CPF,ENDERECO.CEP,ENDERECO.RUA,ENDERECO.BAIRRO,ENDERECO.CIDADE,ENDERECO.UF,
ENDERECO.NUMERO) VALUES ('$cpf','$cep','$rua','$bairro','$cidade','$estado','$numero')";

$select =  mysqli_query($conexao,$query);


// Verificando se adicionou
if($select){
    // Se adicionou redireciona para pagina com a mensagem da sucesso.
    $_SESSION['msg'] = "MSG04";
    header('Location: ../inicial.php');
    die();
}

?>