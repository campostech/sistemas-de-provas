<?php
require_once('../adminphp/conecta.php');
$urlRedirect = '../solicitacoes.php?status=';

$id = $_REQUEST["id"];
if($_REQUEST["status"] == '4')
  $urlRedirect = '../minhas_solicitacoes.php?status=';

$status = $_REQUEST["status"];
$obs = isset($_REQUEST["obs"]) ? $_REQUEST["obs"] : '';

if($_REQUEST["status"] == '3' && $obs == ''){
  $status = "403";
}else{
  $query_mysql = "UPDATE `impressoes` SET `STATUS` = '$status', `OBS` = '$obs' WHERE `impressoes`.`ID` = '$id'";
  $select = mysqli_query($conexao, $query_mysql);
  if($select)
      $status = "200";
}



header("Location: ".$urlRedirect.$status);
exit();
?>
