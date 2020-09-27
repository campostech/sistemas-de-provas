<?php

$json_status_data = 0;
$json_usuario_data = 0;

$query_solicitacoes_por_usuarios = "SELECT users.nome, impressoes.ID, impressoes.CPF_PROFESSOR, COUNT(*) AS COUNT_IMPRESSOES
                FROM users
                LEFT JOIN impressoes ON impressoes.ID_PROFESSOR = users.ID
                GROUP BY users.ID";

$select_solicitacoes_usuario = mysqli_query($conexao, $query_solicitacoes_por_usuarios);

if($select_solicitacoes_usuario){
    $dados_solicitacoes_usuario = mysqli_fetch_all($select_solicitacoes_usuario, MYSQLI_ASSOC);
    
    
    if($dados_solicitacoes_usuario){
        $json_usuario_data = [];
        
        foreach($dados_solicitacoes_usuario AS $indice => $valor){              
            $usuario_data = [
                "dataset" => $valor['COUNT_IMPRESSOES'],
                "label" => $valor['nome'],
                "color" => "",
            ];
            array_push($json_usuario_data, $usuario_data);
            $usuario_data = [];            
        }
        $json_usuario_data = json_encode($json_usuario_data);        
    }else{

    }
}else{

}


$query_solicitacoes_por_status = "SELECT impressoes.ID, impressoes.CURSO, solicitacao_status.STATUS, solicitacao_status.color, count(*) AS COUNT_STATUS
                FROM impressoes
                LEFT JOIN solicitacao_status ON solicitacao_status.ID = impressoes.STATUS
                group by solicitacao_status.STATUS
";

$select_solicitacoes_status = mysqli_query($conexao, $query_solicitacoes_por_status);


if($select_solicitacoes_status){
    $dados_solicitacoes_status = mysqli_fetch_all($select_solicitacoes_status, MYSQLI_ASSOC);
    
    
    if($dados_solicitacoes_status){                
        $json_status_data = [];
        foreach($dados_solicitacoes_status AS $indice => $valor){
            $status_data = [
                "dataset" => $valor['COUNT_STATUS'],
                "label" => $valor['STATUS'],
                "color" => "",
            ];
            array_push($json_status_data, $status_data);
            $status_data = [];            
        }
        $json_status_data = json_encode($json_status_data);        
    }else{
    }
}else{
}
