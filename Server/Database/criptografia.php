<?php

function criptPadrao($dados){
    $dados = base64_encode($dados);
    $dados = base64_encode($dados);
    $dados = base64_encode($dados);
    $dados = base64_encode($dados);
    return $dados;
}