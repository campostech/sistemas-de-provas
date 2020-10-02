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


$query_busca_usuarios = "SELECT ID, NOME, EMAIL, CPF FROM users";

$select = mysqli_query($conexao, $query_busca_usuarios);

if ($select) {
    $dados_usuarios = mysqli_fetch_all($select, MYSQLI_ASSOC);
    if ($dados_usuarios) {
        $table_data = "";

        foreach ($dados_usuarios as $indice => $valor) {            
            $cpf = formataCpf($valor['CPF']);
            $table_data = $table_data . '<tr>
                                            <td>'.$valor['NOME'].'</td>
                                            <td>'.$cpf.'</td>
                                            <td>'.$valor['EMAIL'].'</td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn btn-outline-secondary">Editar</button>
                                                </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#confirma_exclusao" data-whatever="@getbootstrap" value="'.$valor['ID'].'">Excluir</button>
                                                </a>
                                            </td>
                                        </tr>';
        }
    } else {
    }
}


?>