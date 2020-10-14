<?php 
// SOMENTE PARA TESTE DIRETO NO PATH DO CONTROLLER
// require_once('../adminphp/conecta.php');
// require_once('../controller/exibeDados.php');
// require_once('../adminphp/validaSessao.php');

//QUERY que será executada no bando de dados
$prof = $_SESSION['ID'];
$query_mysql = "SELECT impressoes.*, users.NOME, tipos_impressoes.DESCRICAO, solicitacao_status.STATUS FROM impressoes
INNER JOIN users ON users.ID = impressoes.ID_PROFESSOR
INNER JOIN tipos_impressoes ON tipos_impressoes.ID = impressoes.ID_TIPO_IMPRESSOES
INNER JOIN solicitacao_status ON solicitacao_status.ID = impressoes.STATUS
WHERE impressoes.ID_PROFESSOR = $prof order by DATA_SOLICITACAO desc";


$select = mysqli_query($conexao, $query_mysql);

if ($select) {
    $dados_solicitacoes = mysqli_fetch_all($select, MYSQLI_ASSOC);
    $status = "200";
    

    if ($dados_solicitacoes) {
        $table_data = "";

        foreach ($dados_solicitacoes as $indice => $valor) {
            $valor['DATA_SOLICITACAO'] = date("d/m/Y", strtotime($valor['DATA_SOLICITACAO']));
            $botao ='';

            if($valor['STATUS'] == 'Pendente'){
                $botao = '<button type="button" class="btn btn-outline-secondary" onclick="openRemoveModal('.$valor["ID"].');">Cancelar</button>';
            }else if($valor['STATUS'] == 'Recusada'){
                $botao = '<button type="button" class="btn btn-outline-info" onclick="alert(\''.str_replace('\'',"",str_replace('"',"",$valor["OBS"])).'\');">Info</button>';
            }

            $table_data = $table_data . "<tr>
                            <td>" . $valor['ID'] . "</td>
                            <td>" . $valor['DESCRICAO'] . "</td>
                            <td>" . $valor['DATA_SOLICITACAO'] . "</td>
                            <td>" . $valor['QUANTIDADE'] . "</td>
                            <td>" . $valor['STATUS'] . "</td>".
                            '<td>'.$botao.'</td>'.
                        "</tr>";

        }
        // SOMENTE PARA TESTE DIRETO NO PATH DO CONTROLLER
        // echo $table_data;

    } else {
        $status = "403";
    }
} else {
}
   


?>
