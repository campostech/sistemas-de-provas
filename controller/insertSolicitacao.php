<?php
// session_start();
// Adiciona o arquivo de conexão
require_once('../adminphp/conecta.php');
// require_once('../adminphp/validaSessao.php');

// echo $_REQUEST['fileData']."<br>";
// $img = $_REQUEST['fileData']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
// $img = str_replace('data:application/pdf;base64,', '', $img);
// $img = str_replace(' ', '+', $img);
// $data = base64_decode($img);
// file_put_contents(getcwd(), $data);

$valores_form = [];
$valores_validos = true;
$urlRedirect = "../solicitar_impressao.php?status=";
$status = "403";
var_dump($_FILES);

if(isset($_REQUEST['salvar-solicitacao']) ){
    foreach($_REQUEST as $indice => $valor){
        if(empty($valor) && !isset($valor)){            
            // echo "Campo não informado ".$indice;
            $valores_validos = false;
            break;
        }
        else{
            if($indice == "quantidade" or $indice == "check_frente_verso" or $indice == "tipo_de_impressao"){
                if(is_numeric($valor)){
                    $valor = intval($valor);
                }
                else{
                    // echo "Campo ".$indice." inválido";      
                    $valores_validos = false;              
                    break;
                }                
            }            
            $valores_form[$indice] = $valor;            
        }
    }

    
    $targetfolder = "../files/";
    $date = date_create();
    $name = date_timestamp_get($date).'.pdf';
    $targetfolder = $targetfolder . $name;

    $ok=1;

    $file_type=$_FILES['fileT']['type'];

    if ($file_type=="application/pdf") {

        if(move_uploaded_file($_FILES['fileT']['tmp_name'], $targetfolder))

        {

            // echo "The file ". basename( $_FILES['fileT']['name']). " is uploaded";

        } else {

            $valores_validos = false;

        }

    } else {

        $valores_validos = false;

    }

    if(!$valores_validos){
        $status = "403";
 //       echo 'Não é possível continuar, pois um ou mais valores estão incorretos.';
    }else{
        $data = date("Y-m-d h:m:s");
        
        //continua o código 
        $query = "INSERT INTO impressoes (ID_TIPO_IMPRESSOES, CURSO, DISCIPLINA, QUANTIDADE, FRENTE_VERSO, STATUS, FILE, DATA_SOLICITACAO, ID_PROFESSOR) 
        VALUES ('$valores_form[tipo_de_impressao]', '$valores_form[nome]', '$valores_form[disciplina]', '$valores_form[quantidade]', '$valores_form[check_frente_verso]', '1', '$name', '$data', '$valores_form[idProf]')";
        $select =  mysqli_query($conexao,$query);
        
        $urlRedirect = $urlDefault."/solicitar_impressao.php?status=";
        if($select){
            $status = "200";
        }else{
            echo mysqli_errno($conexao). " ".mysqli_error($conexao);
            return;
        }
    }
}
header("Location: ".$urlRedirect.$status);
exit();

?>