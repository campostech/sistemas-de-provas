<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');
require_once('../adminphp/verificausuario.php');
// Adiciona o arquivo de verificação

// Verificando novamente se usuário ou senha estão vazios
if(empty($_POST['cpf']) || empty($_POST['senha'])){
  header('Location: ../login.php');
}

// Verificação contra SQLINJECTION
$usuario =  mysqli_real_escape_string($conexao , $_POST['cpf']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

//se o usuario digitar o cpf com ponto e traço, irá remover e deixar só os numeros, fazendo assim o usuario conseguir logar.
$usuario = preg_replace('/[^0-9]/is', '', $usuario);
$senha = md5($senha);

$query = "select * from users where CPF ='$usuario' and SENHA = '$senha' and STATUS_USER = 1";
$select =  mysqli_query($conexao,$query);

$nome = $select->fetch_assoc();

// mysqli_num_rows retorna numero de linhas encontradas pelo select
$retorno = mysqli_num_rows($select);
// var_dump(md5('123456'));return;

//Caso sejá 1 ele digitou senha e usuário corretos
  if($retorno == 1){
      logaUsuario($usuario);
      $urlDefault = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . '/';
      criaSessao($nome["ID"],$nome["CPF"],$nome["NOME"],$nome["EMAIL"],$nome["ID_PERFIL"], $urlDefault);
      var_dump(getSessao());
      $_SESSION['msg'] = "";
    // Verifica o perfil do usuário para redirecionar a tela correta.
    if($nome["ID_PERFIL"] == 1){
      header('Location: ../admin_home.php');
      }else if($nome["ID_PERFIL"]==2){
      header('Location: ../professor_home.php');
      }
      exit();
   }else{
      // caso não encontre nenhum usuário.
        $_SESSION['msg'] = "MSG02";
        header('Location: ../login.php?status=401');
        exit();
    }
?>
