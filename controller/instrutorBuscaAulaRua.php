<?php

// require_once('../adminphp/conecta.php');

// Cria as linhas com os dados do laboratorio
function listaAulaRua(){
    $INSTRUTOR = $_SESSION['CPF'];
    
    
//QUERY que será executada no bando de dados
    $query = "SELECT A.CODIGO AS CODIGO, A.FK_USUARIO_CPF AS USUARIO_CPF,A.Fk_INSTRUTOR_CPF AS INSTRUTOR_CPF, A.DATA AS DATA_AULA,A.HORA_INICIO AS HORA_INICIO, A.HORA_FIM AS HORA_FIM,U.NOME AS NOME,date_format(`DATA`,'%d/%m/%Y') as `data_formatada`,A.QUANTIDADE as QUANTIDADE FROM AULA_RUA AS A INNER JOIN USUARIO AS U ON FK_USUARIO_CPF = U.CPF where FK_INSTRUTOR_CPF = $INSTRUTOR ";
    $resultado = mysqli_query(buscaconexao(),$query);
    
    
// Resultado da QUERY executada no bando de dados
    while($aula_rua = mysqli_fetch_assoc($resultado)){
      
    // mysqli_fetch_assoc Transforma o resultado do select em um conjunto onde o dado que busta na tabela pode ser referênciado pelo nome da coluna.
        // Cria a LINHA  
   if($_SESSION['PERFIL'] == 3){ 
        echo "<!-- LINHA DO LABORATORIO -->
            <tr>
                <td>".$aula_rua["USUARIO_CPF"]."</td>
                <td>".$aula_rua["NOME"]."</td>
                <td>".$aula_rua["data_formatada"]."</td>
                <td>".$aula_rua["HORA_INICIO"]."</td>
                <td>".$aula_rua["HORA_FIM"]."</td>
                <td>".$aula_rua["QUANTIDADE"]."</td>
                 
             </tr> ";    
        
  
    
}
    }
}
?>