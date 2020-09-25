<?php



// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');
require_once('../utils/validations.php');



$urlRedirect = "../meus_dados.php?status=";
$status = "200";
$valores_validos = true;
$valores_form = [];


if(isset($_POST)){
    foreach($_POST as $indice => $valor){
        if(empty($valor) && !isset($valor)){
            $valores_validos = false;
            break;
        }
        //verificações
        else{
            //verifica se o indice é cpf ou perfil para validar os valores.
            if($indice == 'cpf' or $indice == 'perfil'){
                
                //valida o cpf e transforma só em numero, isso se tiver valido
                if($indice == 'cpf' && validaCpf($valor)){
                    $valor = intval(preg_replace( '/[^0-9]/is', '', $valor));
                }
                
                //valida e transforma o valor de perfil pra inteiro 
                else if($indice == 'perfil' && is_numeric($valor)){
                    $valor = intval($valor);                    
                }
                //se nao for nenhum dos dois irá retornar falso.
                else{
                    $valores_validos = false;                    
                    break;
                }
            }
            //valida a senha
            else if($indice == 'password' && !validaSenha($valor, $_REQUEST['cpassword'])){
                $valores_validos = false;                    
                break;
            }
            $valores_form[$indice] = $valor;  
        }
    }
}

if(!$valores_validos){    
    $status = "403";
}

else{

    $senha = mysqli_real_escape_string($conexao,md5($valores_form['password']));

    //QUERY que será executada no bando de dados

    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $cpf = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'NOME', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'EMAIL', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'SENHA', FILTER_SANITIZE_NUMBER_INT);

    $result_usuario = "UPDATE usuarios SET CPF='$cpf', NOME='$nome', EMAIL='$email',SENHA='$senha', modified=NOW() WHERE ID='$ID'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);


    //$query = "UPDATE users SET(CPF, NOME, EMAIL, SENHA, WHERE ID='0') 
              //VALUES ($valores_form[cpf],'$valores_form[nome]','$valores_form[email]','$senha')";
    
     
    if(mysqli_affected_rows($conecta)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: meus_dados.php");
}   else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: meus_dados.php?id=$id");
}
    
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