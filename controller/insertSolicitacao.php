<?php
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');

// echo $_POST["curso"];
// echo $_POST["disciplina"];
// echo $_POST["tipo"];
// echo $_POST["quantidade"];
// echo $_POST["frenteverso"];

// $vCurso = isset($_POST['curso']);
// $vDisciplina = isset($_POST['disciplina']);


// if($vCurso && $vDisciplina && $vTipo && $vQuantidade){
//     echo 'tem todos os campos preenchidos';
// }else{
//     echo 'não tem todos os campos preenchidos';
// }


// $idsCampos = ['curso','disciplina','tipo','quantidade','frenteverso'];
// $possuiTodosOsCampos = true;

// for($i = 0; $i < count($idsCampos); $i++){
//     if( !isset($_POST[$idsCampos[$i]]) ){
//         $possuiTodosOsCampos = false;
//     }
// }

// if($possuiTodosOsCampos){
//     echo 'Possui Todos os Campos Preenchidos';
// }else{
//     echo 'Algum campo não foi preenchido';
// }

$valores_form = [];
$valores_validos = true;


if(isset($_REQUEST['salvar-solicitacao']) ){
    foreach($_REQUEST as $indice => $valor){
        if(empty($valor) && !isset($valor)){            
            echo "Campo não informado ".$indice;
            $valores_validos = false;
            break;
        }
        else{
            if($indice == "quantidade" && !is_numeric($valor)){
                echo "Campo Quantidade inválido";
                $valores_validos = false;
                break;
            }        
            elseif($indice =="check_frente_verso"){
                $valor = boolval($valor);                                  
                
                if(gettype($valor) != 'boolean'){
                    echo "Campo Frente e Verso inválido";
                    $valores_validos = false;
                    break;
                } 
                
                
            }           
            array_push($valores_form, $valor);
        }
    }
    if(!$valores_validos){
        echo 'Não é possível continuar, pois um ou mais valores estão incorretos.';
    }else{
        //continua o código
        // $query = "INSERT INTO impressoes ('CPF_PROFESSOR', 'ID_TIPO_IMPRESSOES', 'CURSO', 'DISCPLINA', 'QUANTIDADE', 'FRENTE_VERSO', 'STATUS', 'LINK') VALUES 
        // ('145300145365','1','$valores_form[0]','$valores_form[1]',42,1,'Aguardando...','sem link')";

        $query = "INSERT INTO impressoes ('CPF_PROFESSOR', 'ID_TIPO_IMPRESSOES', 'CURSO', 'DISCPLINA', 'QUANTIDADE', 'FRENTE_VERSO', 'STATUS', 'LINK') VALUES 
        (145300145365,1,'teste','teste2',42,1,1,'sem link')";
        $select =  mysqli_query($conexao,$query);

        // mysqli_query -> Envia a conexão e a query para execução
        // $select -> variavel com resultado da query 
    }
}


//QUERY que será executada no bando de dados

// $query = "INSERT INTO users (users.CPF,users.NOME,users.EMAIL,users.SENHA,users.PERFIL_ID) VALUES ($cpf,'$nome','$email','$senha',$perfil)";
// $select =  mysqli_query($conexao,$query);

//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

//



?>