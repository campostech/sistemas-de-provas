<?php


$json_totalxconcluidos_data = 0;

//busca todas as solicitaçoes do professor logado.
$query_todas_solicitacoes = "SELECT impressoes.id, impressoes.status, count(*) as count_solicitacoes
                    from impressoes 
                    where id_professor = $usuario_logado
                    HAVING COUNT(count_solicitacoes) <> 0";


//busca as solicitacoes do professor logado que ja foram concluidas
$query_solicitacoes_resolvidas = "SELECT impressoes.id, impressoes.status, solicitacao_status.STATUS , count(*) as count_solicitacoes_aprovadas from impressoes 
                    INNER Join solicitacao_status on solicitacao_status.id = impressoes.status                    
                    where solicitacao_status.STATUS = 'Resolvida' and id_professor =  $usuario_logado
                    HAVING COUNT(count_solicitacoes_aprovadas) <> 0";



//faz a query no banco de todas as solicitacoes
$select_todas_solicitacoes = mysqli_query($conexao, $query_todas_solicitacoes);

//faz a query no banco de todas as solicitacoes do professor logado já resolvidas
$select_solicitacoes_resolvidas = mysqli_query($conexao, $query_solicitacoes_resolvidas);



///

if($select_todas_solicitacoes && $select_solicitacoes_resolvidas){
    $dados_total_solicitacoes = mysqli_fetch_all($select_todas_solicitacoes , MYSQLI_ASSOC);
    $dados_solicitacoes_resolvidas = mysqli_fetch_all($select_solicitacoes_resolvidas, MYSQLI_ASSOC);
    $json_totalxconcluidos_data = [];
    

    if($dados_total_solicitacoes){        
        foreach ($dados_total_solicitacoes as $indice => $valor) {       
            $status_data = [
                "dataset" => $valor['count_solicitacoes'],
                "label" => "Solicitadas",
                "color" => "#2f83d6",                
            ];
            array_push($json_totalxconcluidos_data, $status_data);
            $status_data = [];            
        }
    }       
    if($dados_solicitacoes_resolvidas){
        foreach ($dados_solicitacoes_resolvidas as $indice => $valor) {
            $status_data = [
                "dataset" => $valor['count_solicitacoes_aprovadas'],
                "label" => "Resolvidas",
                "color" => "#20d638",
            ];    
            array_push($json_totalxconcluidos_data, $status_data);
            $status_data = [];
                  
        }
    }            
    $json_totalxconcluidos_data = json_encode($json_totalxconcluidos_data);    
    
}
else{
    $json_totalxconcluidos_data = 0;
    $d_none_totalxconcluidos = $json_totalxconcluidos_data == 0 ? "d-none" : "";
}


?>