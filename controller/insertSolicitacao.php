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

// echo $_POST["file"];

//

//QUERY que será executada no bando de dados

// $query = "INSERT INTO users (users.CPF,users.NOME,users.EMAIL,users.SENHA,users.PERFIL_ID) VALUES ($cpf,'$nome','$email','$senha',$perfil)";
// $select =  mysqli_query($conexao,$query);

//mysqli_query -> Envia a conexão e a query para execução
// $select -> variavel com resultado da query 

//



?>