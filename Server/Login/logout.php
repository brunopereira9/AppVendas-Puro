<?php
include_once('../Database/index.php');
include_once('../Database/criptografia.php');

@session_start();
@session_destroy();

$resultLogin = array( 'mensagem' => true);
http_response_code(200);

echo json_encode($resultLogin);
