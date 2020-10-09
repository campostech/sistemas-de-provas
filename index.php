<?php
require_once('adminphp/validaSessao.php');

if($_SESSION['PERFIL'] == 1){
  echo '<body><script>window.location.replace("admin_home.php")</script></body>';
}else if($_SESSION['PERFIL'] == 2){
    echo '<body><script>window.location.replace("professor_home.php")</script></body>';
}

?>
