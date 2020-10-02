<?php


// CRIANDO TEMPO DE CACHE
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

session_cache_expire(10);
$cache_expire = session_cache_expire();

session_start();


function verificaNivel(){
if($_SESSION['PERFIL'] == 1){
    header('Location: inicial_adm.php');
}else if($_SESSION['PERFIL'] == 2){
    header('Location : inicial_professor.php');
}
}


//Função que verifica se o login está ativo
function verificaLoginAtivo(){
    if($_SESSION['LOGIN'] == true){
        return $_SESSION['LOGIN'];    
    }else{
        return false;
    }
}


//Função que retorna o nome do usuario logado
function nomeUsuarioLogado(){
    return $_SESSION['NOME'];
}


//Função que retorna o CPF do usuario logado
function cpfUsuarioLogado(){
    return $_SESSION['CPF'];
}


//função que retorna se o usuário tem ou não previlégio de reservar
// function podeReservar(){
//    if($_SESSION['RESERVAR'] ==1){
//        return true;
//    } else {
//    return false;    
//    }
// }

// Adiciona o email e login a sessão
function logaUsuario($cpf){
   $_SESSION['CPF']= $cpf;
   $_SESSION['LOGIN']= true;

 }
 
 
 //Cria sessão com os dados basicos 
 function criaSessao($cpf, $nome , $email,$perfil){
  $_SESSION['CPF']= $cpf;
  $_SESSION['NOME']= $nome;
  $_SESSION['USUARIO']= $email;
  $_SESSION['PERFIL']= $perfil;
  $_SESSION['msg']= "";
  $_SESSION['LOGIN']= true;
 }


 //get sessão
//se valor da sessao for informado retornará o valor da sessão especifico.
 function getSessao($valor=""){
    if(!empty($valor)){
        return $_SESSION[$valor];
    }
    return $_SESSION;     
 }
 
 
 //Destroi a sessão ou sejá logout.
 function logout(){
     $_SESSION['PERFIL']=0;
     $_SESSION['LOGIN'] = FALSE;
     session_start();
     session_destroy();
     header('Location: ../login.php');
     die();
 }

 
  //Cria sessão com os dados basicos 
 function verificaAdm(){
if($_SESSION['PERFIL'] > 1){
     logout();
     die();
}
 }


 