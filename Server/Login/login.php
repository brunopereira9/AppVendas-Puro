<?php
include_once('../Database/ConectaDB.php');
include_once('../Database/criptografia.php');

$senha = trim(addslashes($_REQUEST['senha']));
$login = trim(addslashes($_REQUEST['login']));
$login = mb_strtolower($login, 'UTF-8');//passa a string para minusculo
$login = criptPadrao($login);
$senha = criptPadrao($senha);


$query = $db->query("SELECT id
                                 FROM tbl_usuario 
                                WHERE login = '".$login."' 
                                  AND senha = '".$senha."'");
$result = $query->fetch(PDO::FETCH_OBJ);

if ($query->rowCount() == 1){
    @session_start();

    $_SESSION['id_login'] = criptPadrao($result->id);
    $resultLogin = array( 'id' => $_SESSION['id_login']);
    http_response_code(200);

}else{
    $resultLogin = array( 'mensagem' => 'Login e/ou Senha incorretos');
    http_response_code(404);
}
echo json_encode($resultLogin);
