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
            return $pdo;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

    public function fazSelect($sql,$status,$array_obj){
        $db = new ConectaDB();
        $db = $db->conectaDb();
        if ($db != false){
            $db->query($sql);
            if ($array_obj == 'obj') {

                return $db->fetch(PDO::FETCH_OBJ);

            }else if ($array_obj == 'array'){
                return $db->fetch(PDO::FETCH_ASSOC);
            }
        }else{
            return $status;
        }
    }
}
