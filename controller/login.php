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




  
    $query = "select * from users where CPF ='{$usuario}' and SENHA = md5('{$senha}')";
    $select =  mysqli_query($conexao,$query);

  $nome = $select->fetch_assoc();

  // mysqli_num_rows retorna numero de linhas encontradas pelo select
  $retorno = mysqli_num_rows($select);

  //Caso sejá 1 ele digitou senha e usuário corretos
  if($retorno == 1){
      logaUsuario($usuario);
      criaSessao($nome["CPF"],$nome["NOME"],$nome["EMAIL"],$nome["ID_PERFIL"]);            
      var_dump(getSessao());
    // Verifica o perfil do usuário para redirecionar a tela correta.
    if($nome["ID_PERFIL"] == 1){
      header('Location: ../admin_home.php');
      }else if($nome["ID_PERFIL"]==2){
      header('Location: ../inicial_professor.php');
      }
      exit();
      }else{
      // caso não encontre nenhum usuário.
        $_SESSION['msg'] = "MSG02";
        header('Location: ../index.php');
        exit();
    }



?>
