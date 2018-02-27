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
            $result = $data->query($sql);
            if ($array_obj == 'obj') {
                $arrayReturn['data'] = $result->fetch(PDO::FETCH_OBJ);
                return $arrayReturn;

            }else if ($array_obj == 'array'){
                $arrayReturn['data'] = $result->fetch(PDO::FETCH_ASSOC);
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
            try{
                $data->beginTransaction();
                $data->exec($sql);
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
            $arrayReturn['result'] = false;
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
            $arrayReturn['result'] = false;
            return $arrayReturn;
        }

    }

    public function criaChaveEstrangeira($tabelaLocal, $constraint, $campoLocal, $campoReferencia, $tabelaReferencia){

        $arrayReturn = $this->conectaDb();

        if ($arrayReturn['result']){
            $data = $arrayReturn['data'];
            $sql = "ALTER TABLE $tabelaLocal ADD CONSTRAINT $constraint FOREIGN KEY ( $campoLocal ) REFERENCES $campoReferencia ( $tabelaReferencia )";
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
            $arrayReturn['result'] = false;
            return $arrayReturn;
        }

    }

}
