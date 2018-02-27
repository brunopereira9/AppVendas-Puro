<?php
    include_once('../ConectaDB.php');
    $nomeTabela = "tbl_usuario";
    $camposTabela = "id INT(10) UNSIGNED AUTO_INCREMENT,
                     ativo VARCHAR(1) NOT NULL,
                     cadastro_id INT(10) UNSIGNED NOT NULL,
                     login VARCHAR(200) NOT NULL,
                     senha VARCHAR(200) NOT NULL,
                     senha_confirma VARCHAR(200) NOT NULL,
                     grupo_liberacao_id INT(10) UNSIGNED NOT NULL,
                     PRIMARY KEY (id)";

    $db = new ConectaDB();
    $db->criaTabela($nomeTabela,$camposTabela);