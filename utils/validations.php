<?php
//Centralizador de funções de validação.

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}


function validaSenha($senha, $confirmacao_de_senha=""){
    
    $isValido = true;
    
    //verifica se a senha está vazia
    if(empty($senha) or empty($confirmacao_de_senha)){
        $isValido = false;
    }
    //verifica se a senha e a confirmação sao iguais
    else if($senha != $confirmacao_de_senha){
        $isValido = false;
    }
    //verifica o tamanho da senha
    else if (strlen($senha) < 8){
        $isValido = false;
    }

    return $isValido;
}



?>