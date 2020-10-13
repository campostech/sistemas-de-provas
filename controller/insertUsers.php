<?php

// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');
require_once('../utils/validations.php');



function verificaCpfCadastro($cpf, $conexao){
    //verifica se cpf já existe no banco
    $cpf_inserido = preg_replace( '/[^0-9]/is', '', $_POST['cpf']);
    $query_consulta_cpf = "SELECT * FROM USERS WHERE cpf = $cpf_inserido";
    $consulta_cpf = mysqli_query($conexao, $query_consulta_cpf);   

    if($consulta_cpf){
        $busca_usuario = mysqli_fetch_all($consulta_cpf, MYSQLI_ASSOC);
        if($busca_usuario){
            return false;
        }
        return true;
}}

$urlRedirect = "../novo_cadastro.php?status=";
$status = "200";
$valores_validos = true;
$valores_form = [];


if(isset($_POST)){
    //verifica se o cpf informado já foi cadastrado anteriormente
    if(!verificaCpfCadastro($_POST['cpf'], $conexao)){
        $valores_validos = false;
        $status = "403";
        header("Location: ".$urlRedirect.$status);
    }else{

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
                        $valor = preg_replace( '/[^0-9]/is', '', $valor);
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
}

if(!$valores_validos){    
    $status = "403";
}

else{

    $senha = mysqli_real_escape_string($conexao,md5($valores_form['password']));

    //QUERY que será executada no bando de dados
    $query = "INSERT INTO users (CPF, NOME, EMAIL, SENHA, ID_PERFIL) 
              VALUES ('$valores_form[cpf]','$valores_form[nome]','$valores_form[email]','$senha',$valores_form[perfil])";

    
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