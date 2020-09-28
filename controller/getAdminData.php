<?php

$no_data = '
    <div class="sem-conteudo">
        <div class="sem-conteudo-icon">
            <i class="fas fa-mug-hot"></i>
        </div>
        <div class="sem-conteudo-texto">
            <p>Nenhum registro foi carregado</p>
        </div>
    </div>';




$query_mysql = "SELECT impressoes.*, users.NOME FROM impressoes 
                    INNER JOIN users ON users.ID = impressoes.ID_PROFESSOR
                    where impressoes.status = 1 order by impressoes.id limit 10";

$select = mysqli_query($conexao, $query_mysql);



if ($select) {
    $dados_solicitacoes = mysqli_fetch_all($select, MYSQLI_ASSOC);

    if ($dados_solicitacoes) {
        $table_data = "";

        foreach ($dados_solicitacoes as $indice => $valor) {
            $data = date("d/m/Y", strtotime($valor['DATA_SOLICITACAO']));

            $table_data = $table_data . "<tr>                            
                            <td>" . $valor['NOME'] . "</td>
                            <td>" . $data . "</td>
                            <td>" . $valor['CURSO'] . "</td>
                            <td>" . $valor['DISCIPLINA'] . "</td>
                            <td>" . $valor['QUANTIDADE'] . "</td>
                            <td><a href='solicitacoes.php?solicitacao_id=" . $valor['ID'] . "' value='" . $valor['ID'] . "'class='btn btn-info btn-lg btn-acoes' name='ver-mais-button'>Ver mais</a>                            
                        </tr>";
        }
    } else {
    }
} else {
}
?>