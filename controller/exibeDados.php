<?php 

//QUERY que será executada no bando de dados

$query = "SELECT id, descricao, data_solicitacao, status FROM IMPRESSOES 
                JOIN tipos_impressoes ON impressoes.id_tipo_impressoes = tipos_impressoes.id";
//                JOIN solicitacao_status ON impressoes.status = solicitacao_status.stats";


$select =  mysqli_query($conexao,$query);

$dados = mysqli_fetch_array($select);

while ( mysql_fetch_array($select)){

    $table = $table.

    <tr>
        <td> echo $dados["id"]</td>
        <td> echo $dados["descricao"]</td>
        <td> echo $dados["data_solicitacao"]</td>
        <td> echo $dados[""]</td>
        <td> echo $dados[""]</td>
    </tr>

}

?>