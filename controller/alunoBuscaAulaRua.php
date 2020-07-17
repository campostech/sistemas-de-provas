<?php 

    function alunoBuscaAulaRua(){
        $aluno=$_SESSION['CPF'];

        $query="SELECT AR.FK_USUARIO_CPF AS CPF_ALUNO,AR.FK_INSTRUTOR_CPF AS CPF_INSTRUTOR,AR.CODIGO AS CODIGO, AR.DATA as DATA, date_format(`DATA`,'%d/%m/%Y') AS `DATA_FORMATADA`,AR.HORA_INICIO AS HORA_INICIO,AR.HORA_FIM AS HORA_FIM,AR.QUANTIDADE AS QUANTIDADE,I.NOME AS NOME FROM AULA_RUA AS AR INNER JOIN INSTRUTOR AS I ON I.CPF=AR.FK_INSTRUTOR_CPF WHERE AR.FK_USUARIO_CPF=$aluno";

        $resultado=mysqli_query(buscaconexao(),$query);

        while($aluno_rua=mysqli_fetch_assoc($resultado)){
            echo "
                <tr>
                    <td>".$aluno_rua['NOME']."</td>
                    <td>".$aluno_rua['DATA_FORMATADA']."</td>
                    <td>".$aluno_rua['HORA_INICIO']."</td>
                    <td>".$aluno_rua['HORA_FIM']."</td>
                    <td>".$aluno_rua['QUANTIDADE']."</td>
                </tr>
            ";
        }
    }



?>