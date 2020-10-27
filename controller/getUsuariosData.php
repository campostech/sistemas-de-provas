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



$logged_user = $_SESSION['ID'];

$query_busca_usuarios = "SELECT ID, NOME, EMAIL, CPF FROM users WHERE ID != $logged_user and users.STATUS_USER = 1"; 


$select = mysqli_query($conexao, $query_busca_usuarios);

if ($select) {
    $dados_usuarios = mysqli_fetch_all($select, MYSQLI_ASSOC);
    if ($dados_usuarios) {
        $table_data = "";

        foreach ($dados_usuarios as $indice => $valor) {            
            $cpf = formataCpf($valor['CPF']);
            $table_data = $table_data . '<tr class="usuario-tabela">
                                            <td class="info-nome">'.$valor['NOME'].'</td>
                                            <td>'.$cpf.'</td>
                                            <td>'.$valor['EMAIL'].'</td>
                                            <td>                                                                                         
                                                <button type="button" class="btn btn-outline-secondary" onclick="openRemoveModal('.$valor["ID"].');">Remover Usuario</button>                                                
                                            </td> 
                                        </tr>';
        }
    } else {
    }
}


?>