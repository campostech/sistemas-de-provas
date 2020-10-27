<?php
 //require_once('../adminphp/conecta.php');

$no_data = '
    <div class="sem-conteudo">
        <div class="sem-conteudo-icon">
            <i class="fas fa-mug-hot"></i>
        </div>
        <div class="sem-conteudo-texto">
            <p>Nenhum registro foi carregado</p>
        </div>
    </div>';

$query_mysql = "SELECT impressoes.*, users.NOME, tipos_impressoes.DESCRICAO, solicitacao_status.STATUS FROM impressoes
                INNER JOIN users ON users.ID = impressoes.ID_PROFESSOR
                INNER JOIN tipos_impressoes ON tipos_impressoes.ID = impressoes.ID_TIPO_IMPRESSOES
                INNER JOIN solicitacao_status ON solicitacao_status.ID = impressoes.STATUS";
if(isset($filter)){
    $query_mysql = $query_mysql." WHERE impressoes.STATUS = ".$filter;
}

$query_mysql = $query_mysql." order by ID desc";

$select = mysqli_query($conexao, $query_mysql);

if ($select) {
    $dados_solicitacoes = mysqli_fetch_all($select, MYSQLI_ASSOC);

    if ($dados_solicitacoes) {
        $table_data = "";
        $dataQuery = [];
        $idObj = 0;
        foreach ($dados_solicitacoes as $indice => $valor) {
            $valor['DATA_SOLICITACAO'] = date("d/m/Y", strtotime($valor['DATA_SOLICITACAO']));

            $table_data = $table_data . "<tr>
                            <td>" . $valor['NOME'] . "</td>
                            <td>" . $valor['DISCIPLINA'] . "</td>
                            <td>" . $valor['DESCRICAO'] . "</td>
                            <td>" . $valor['QUANTIDADE'] . "</td>
                            <td>" . $valor['STATUS'] . "</td>
                            <td>" . $valor['DATA_SOLICITACAO'] . "</td>".
                            '<td><button onclick="showInfo('.$valor['ID'].')" type="button" class="btn btn-info btn-lg">Opções</button></td>'.
                        "</tr>";

                        // unset($valor['B64FILE']);
                        // $valor['FILE'] = str_replace("data:application/pdf;base64,","",$valor['B64FILE']);
                        $dataQuery[$valor['ID']] = $valor;
                        $idObj++;

        }
        // var_dump($dataQuery);
        $js_array = json_encode($dataQuery);
        print( '<script>'.
        "dataQuery = ". $js_array . ";\n"
        .'</script>');

    } else {
    }
} else {
}




?>
