<?php
    include_once('../ConectaDB.php');
    $sql = "CREATE TABLE IF NOT EXISTS tbl_usuario
                (
                  id INT(10) UNSIGNED AUTO_INCREMENT,
                  ativo VARCHAR(1) NOT NULL,
                  cadastro_id INT(10) UNSIGNED NOT NULL,
                  login VARCHAR(200) NOT NULL,
                  senha VARCHAR(200) NOT NULL,
                  senha_confirma VARCHAR(200) NOT NULL,
                  grupo_liberacao_id INT(10) UNSIGNED NOT NULL,
                  PRIMARY KEY (id)
                )";

    // use exec() because no results are returned
    $db = new ConectaDB();
    $db = $db->conectaDb();
    $db->exec($sql);