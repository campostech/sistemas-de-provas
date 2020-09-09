<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');
require_once('../utils/validations.php');



$urlRedirect = "../novo_cadastro.php?status=";
$status = "200";
$valores_validos = true;
$valores_form = [];


if(isset($_REQUEST['salvar-usuario'])){
    foreach($_REQUEST as $indice => $valor){
        if(empty($valor) && !isset($valor)){            
            // echo "Campo não informado ".$indice;
            $valores_validos = false;
            break;
        }
        else{
            if($indice == 'cpf' or $indice == 'perfil'){
                if($indice == 'cpf' && validaCpf($valor)){
                    $valor = intval(preg_replace( '/[^0-9]/is', '', $valor));
                }
                else if($indice == 'perfil' && is_numeric($valor)){
                    $valor = intval($valor);
                }
                else{
                    $valores_validos = false;                    
                    break;
                }
            }
            $valores_form[$indice] = $valor;            
        }                
    }
}

if(!$valores_validos){
    $status = "403";
}

else{
    var_dump($valores_form);
    echo "<br>";    

    /*
    // Recebe os parametros do formulário
    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao,str_replace($array,'',$_POST['cpf']));
    $email = mysqli_real_escape_string($conexao,$_POST['email']);
    $senha = mysqli_real_escape_string($conexao,md5($cpf));
    $request_perfil = mysqli_real_escape_string($conexao,$_POST['perfil']);
    $perfil = intval($request_perfil);
    $big_int = intval($cpf);
    */

    $senha = mysqli_real_escape_string($conexao,md5($valores_form['cpf']));


    //QUERY que será executada no bando de dados
    $query = "INSERT INTO users (CPF, NOME, EMAIL, SENHA, ID_PERFIL) 
              VALUES ($valores_form[cpf],'$valores_form[nome]','$valores_form[email]','$senha',$valores_form[perfil])";
    
    
    $select =  mysqli_query($conexao,$query);

    if($select){        
        $status = "200";
    }else{
        //echo mysqli_errno($conexao). " ".mysqli_error($conexao);
    }    
}
header("Location: ".$urlRedirect.$status);
exit();


//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

//

/* Verificando se adicionou
if($select){
    // Se adicionou redireciona para pagina com a mensagem da sucesso.
    $_SESSION['msg'] = "MSG04";
    header('Location: ../index.php');
    die();
}*/

?>