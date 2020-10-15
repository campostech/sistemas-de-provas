<?php

// Adiciona o arquivo de conex�o
include_once("../adminphp/conecta.php");
require_once('../adminphp/validaSessao.php');
require_once('../utils/validations.php');

if($_POST['id'] != $_SESSION['ID'] || $_POST['cpf'] != $_SESSION['CPF']){
    logout();
}

$pass = mysqli_real_escape_string($conexao,md5($_POST['password']));
$id = $_POST['id'];
$queryS = "SELECT * FROM users WHERE ID='$id' AND SENHA='$pass'";
$selectS =  mysqli_query($conexao,$queryS);

$urlRedirect = "../meus_dados.php?status=";
$status = "200";
$valores_validos = ($selectS->num_rows != 0);
$valores_form = [];


if(isset($_POST)){
    foreach($_POST as $indice => $valor){
        if(empty($valor) && !isset($valor)){
            $valores_validos = false;
            break;
        }
        //verifica��es
        else{
            //verifica se o indice � cpf ou perfil para validar os valores.
            if($indice == 'cpf' or $indice == 'perfil'){
                
                //valida o cpf e transforma s� em numero, isso se tiver valido
                if($indice == 'cpf' && validaCpf($valor)){
                    $valor = preg_replace( '/[^0-9]/is', '', $valor);
                }
                
                //valida e transforma o valor de perfil pra inteiro 
                else if($indice == 'perfil' && is_numeric($valor)){
                    $valor = intval($valor);                    
                }
                //se nao for nenhum dos dois ir� retornar falso.
                else{
                    $valores_validos = false;                    
                    break;
                }
            }
            //valida a senha
            else if($indice == 'npassword' && !validaSenha($valor, $_REQUEST['cnpassword'])){
                $valores_validos = false;                    
                break;
            }
            $valores_form[$indice] = $valor;  
        }
    }
}
// var_dump($_POST);
// var_dump($selectS);
// var_dump($valores_validos);
// return;
if(!$valores_validos){    
    $status = "403";    
}else{

    $senha = mysqli_real_escape_string($conexao,md5($valores_form['npassword']));

     
    
    //QUERY que ser� executada no bando de dados      

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);      
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);  
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);    
    $senha1 = filter_input(INPUT_POST, '$senha', FILTER_SANITIZE_STRING);     
    

    $query = "UPDATE users SET NOME='$nome', EMAIL='$email',SENHA='$senha'  WHERE ID='$id'";
    
    $select =  mysqli_query($conexao,$query);
     
  
    if($select){        
        $status = "200";
    }else{
        //echo mysqli_errno($conexao). " ".mysqli_error($conexao);
    }    
}
    

header("Location: ".$urlRedirect.$status);
exit();


?>