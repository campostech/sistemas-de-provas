<?php

function buscaAlunoRua(){
        $INSTRUTOR = $_SESSION['CPF'];
        $query= "SELECT UI.FK_USUARIO_CPF AS USUARIO_CPF,UI.FK_INSTRUTOR_CPF AS INSTRUTOR_CPF ,U.NOME AS NOME,U.CPF AS CPF FROM USUARIO_INSTRUTOR AS UI INNER JOIN USUARIO AS U ON U.CPF=UI.FK_USUARIO_CPF WHERE UI.FK_INSTRUTOR_CPF = $INSTRUTOR AND U.APTO_RUA=1";
        $resultado=mysqli_query(buscaconexao(),$query);
        
        while($aluno = mysqli_fetch_array($resultado)){
            echo "<option value=".$aluno['CPF'].">".$aluno['NOME']."</option>";
        }
    }
?>