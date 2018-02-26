<?php
Class ConectaDB{
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $dbname     = "AppVendas";

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username   = "root";
        $this->password   = "";
        $this->dbname     = "AppVendas";
    }

    private function conectaDb(){
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        try {
            $pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return array(
                'result' => true,
                'data' => $pdo,
                'getMessage' => 'Ok'
            );
        }
        catch(PDOException $e)
        {
            return array(
                'result' => false,
                'getMessage' => $e->getMessage()
            );
        }
    }

    public function fazSelect($sql,$array_obj){

        $arrayReturn = $this->conectaDb();

        if ($arrayReturn['result']){
            $data = $arrayReturn['data'];
            $data->query($sql);
            if ($array_obj == 'obj') {
                $arrayReturn['data'] = $data->fetch(PDO::FETCH_OBJ);
                return $arrayReturn;

            }else if ($array_obj == 'array'){
                $arrayReturn['data'] = $data->fetch(PDO::FETCH_ASSOC);
                return $arrayReturn;
            }
        }else{
            return $arrayReturn;
        }
    }
    public function execInsert($sql){

        $arrayReturn = $this->conectaDb();

        if ($arrayReturn['result']){
            $data = $arrayReturn['data'];
            $query = $data->prepare($sql);
            try{
                $data->beginTransaction();
                $query->execute();
                $data->commit();
                $arrayReturn['data'] = $data->lastInsertId();
                return $arrayReturn;

            }catch (PDOExecption $e){
                $data->rollBack();
                $arrayReturn['result'] = false;
                $arrayReturn['getMessage'] = $e->getMessage();
                return $arrayReturn;
            }
        }else{
            return $arrayReturn;
        }
    }

    public function criaTabela($nomeTabela, $camposTabela){

        $arrayReturn = $this->conectaDb();

        if ($arrayReturn['result']){
            $data = $arrayReturn['data'];
            $sql = "CREATE TABLE IF NOT EXISTS $nomeTabela($camposTabela);";
            $query = $data->prepare($sql);
            try{
                $data->beginTransaction();
                $query->execute();
                $data->commit();
                $arrayReturn['data'] = '';
                return $arrayReturn;

            }catch (PDOExecption $e){
                $data->rollBack();
                $arrayReturn['result'] = false;
                $arrayReturn['getMessage'] = $e->getMessage();
                return $arrayReturn;
            }
        }else{
            return $arrayReturn;
        }

    }

    public function criaChaveEstrangeira($tabelaLocal, $constraint, $campoLocal, $campoReferencia, $tabelaReferencia){
        $sql = "ALTER TABLE $tabelaLocal ADD CONSTRAINT $constraint FOREIGN KEY ( $campoLocal ) REFERENCES $campoReferencia ( $tabelaReferencia )";

        // CONSTRAINT fk_id_empresa_cadastro FOREIGN KEY (id_empresa) REFERENCES tbl_empresa (id),
        // CONSTRAINT fk_id_municipio_cadastro FOREIGN KEY (endereco_municipio_cod) REFERENCES tbl_municipio (codigo_municipio),
    }

}
