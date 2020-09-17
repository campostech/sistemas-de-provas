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
    
    
    
    //$query_mysql = "SELECT * FROM impressoes where status = 1 order by id desc limit 1";
    $query_mysql = "SELECT * FROM impressoes 
                    LEFT JOIN users ON users.CPF = impressoes.CPF_PROFESSOR 
                    where status = 1 order by id limit 10";
    $select = mysqli_query($conexao, $query_mysql);


    //2038-01-19
    //echo "<br>";
    if($select){        
    //  $dados_solicitacoes = mysqli_fetch_array($select);
        $dados_solicitacoes = mysqli_fetch_all($select, MYSQLI_ASSOC);
        //var_dump($dados_solicitacoes);
        if($dados_solicitacoes){
            $table_data = "";
           foreach($dados_solicitacoes AS $indice => $valor){
               $data = date("d/m/Y", strtotime($valor['DATA_SOLICITACAO']));       

               $table_data = $table_data."<tr>
                            <td>".$valor['NOME']."</td>
                            <td>".$data."</td>
                            <td>".$valor['CURSO']."</td>
                            <td>".$valor['DISCIPLINA']."</td>
                            <td>".$valor['QUANTIDADE']."</td>                            
                            <td class='actions-colunm'>
                            <div class='table-actions'>
                                <div class='table-action-button' title='Editar' data-toggle='tooltip' data-placement='top'>
                                        <i class='far fa-edit'></i>
                                    </div>
                                    <div class='table-action-button' title='Download' data-toggle='tooltip' data-placement='top'>
                                        <i class='fas fa-download'></i>
                                    </div>
                                    <div class='table-action-button' title='Remover' data-toggle='tooltip' data-placement='top'>
                                        <i class='far fa-trash-alt'></i>
                                    </div>
                                </div>
                            </td>
                        </tr>";
           }
        }
        else{
  
        }
              
    }
    else{              
    }



    
?>


                                                  

