<?php 
define('HOST','localhost:3306');
define('USUARIO','root');
define('SENHA','');
define('DB','sistema_provas');



//Cria conexão com banco de dados
$conexao = mysqli_connect(HOST, USUARIO ,SENHA , DB) or die ('Sem conexão');

//$conexao = mysqli_connect("basemapeamento.mysql.dbaas.com.br", "basemapeamento", "A2000pwd", "basemapeamento");


//Função que retorna conexão com banco de dados
function buscaconexao(){
    $conexao = mysqli_connect(HOST, USUARIO ,SENHA , DB) or die ('Sem conexão');

    return $conexao;
}

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DB . ';', USUARIO, SENHA);

//basemapeamento.mysql.dbaas.com.br