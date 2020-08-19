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


$idsCampos = ['curso','disciplina','tipo','quantidade','frenteverso'];
$possuiTodosOsCampos = true;

for($i = 0; $i < count($idsCampos); $i++){
    if( !isset($_POST[$idsCampos[$i]]) ){
        $possuiTodosOsCampos = false;
    }
}

if($possuiTodosOsCampos){
    echo 'Possui Todos os Campos Preenchidos';
}else{
    echo 'Algum campo não foi preenchido';
}


/*
////////////////////////////////////// Inicio do meu Codigo /////////////

O que eu fiz:


//Maneiras de corrigir o sql injection que encontrei:

//$valor_corrigido = preg_replace('/[^[:alnum:]_]/', '', $_POST[$form[$valor]]); // Altera os caracteres especiais

//vi outro q ele adicionava o slash que é oq eu to usando nesse caso.
//$valor_corrigido = addslashes($_POST[$form[$valor]]);        

//$valor_corrigido = mysql_real_escape_string($_POST[$form[$valor]]);      //<- Esse eu n consegui usar   


Função para o sql injection. Vi de varias maneiras porém optei usar por essa.
function arrumaValorForm($valor_in){
    //remove caracteres especiais do valor de um input o problema é que se eu precisar dos caracteres especiais eu n vou ter
    $valor_out = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $valor_in);
    return $valor_out;
}

$valores_form = [];
$valor_valido = true;

//fazendo assim ate campos que nao sao obrigatorios caem no if.

if(isset($_REQUEST['salvar-solicitacao']) ){
    foreach($_REQUEST as $indice => $valor){
        if(empty($valor) && !isset($valor)){            
            echo "Campo não informado";
            break;
        }
        else{
            //arruma o valor para mysql injection            
            $arruma_valor = arrumaValorForm($valor);
            if($indice == "quantidade" && !is_numeric($arruma_valor)){
                echo "Campo Quantidade inválido";
                break;
            }        
            elseif($indice =="check_frente_verso"){
                $arruma_valor = boolval($arruma_valor);                                  
                
                if(gettype($arruma_valor) != 'boolean'){
                    echo "Campo Frente e Verso inválido";
                    break;
                }                             
            }           
            array_push($valores_form, $arruma_valor);
        }
    }
}

///////////////////////////////////////////// Fim do meu Codigo /////////////


*/




// echo $_POST["file"];

//

//QUERY que será executada no bando de dados

// $query = "INSERT INTO users (users.CPF,users.NOME,users.EMAIL,users.SENHA,users.PERFIL_ID) VALUES ($cpf,'$nome','$email','$senha',$perfil)";
// $select =  mysqli_query($conexao,$query);

//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

//



?>