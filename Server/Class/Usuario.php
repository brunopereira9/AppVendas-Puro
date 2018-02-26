<?php
/**
 * Created by PhpStorm.
 * User: Gilberto
 * Date: 25/02/2018
 * Time: 19:14
 */

class Usuario
{
    private $id;
    private $ativo;
    private $cadastro_id;
    private $login;
    private $senha;
    private $senha_confirma;
    private $grupo_liberacao;

    public function __construct()
    {
        $this->id = '';
        $this->ativo = '';
        $this->cadastro_id = '';
        $this->login = '';
        $this->senha = '';
        $this->senha_confirma = '';
        $this->grupo_liberacao = '';
    }

    public function criaUsuario($ativo, $cadastro_id, $login, $senha, $senha_confirma, $grupo_liberacao){

        if ($senha == $senha_confirma && strpos($senha, ' ')==0){

            $this->ativo = $ativo;
            $this->cadastro_id = $cadastro_id;
            $this->login = $login;
            $this->senha = $senha;
            $this->senha_confirma = $senha_confirma;
            $this->grupo_liberacao = $grupo_liberacao;

            return $this->insereUsuario();

        }else{
            return array(
                'mensagem' => 'Informe as senhas corretamente.',
                'status' => false
            );
        }
    }

    private function insereUsuario(){
        require_once('../Database/ConectaDB.php');



        $db = new ConectaDB();
        $db->exec($sql);
        if($result){
            return array(
                'mensagem' => 'Usuário criado com sucesso.',
                'status' => true
            );
        }else{
            return array(
                'mensagem' => 'Erro ao criar usuário.',
                'status' => false
            );
        }
    }

}