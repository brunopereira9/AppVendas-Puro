<?php
/**
 * Created by PhpStorm.
 * User: Bruno Pereira
 * Date: 27/02/2018
 * Time: 11:10
 */
    include_once ('../ConectaDB.php');
    $db = new ConectaDB();

    $db->criaChaveEstrangeira(
        "tbl_cadastro",
        "fk_id_empresa_cadastro",
        "id_emoresa",
        "id",
        "tbl_empresa"
    );
    $db->criaChaveEstrangeira(
        "tbl_cadastro",
        "fk_id_municipio_cadastro",
        "endereco_municipio_cod",
        "codigo_municipio",
        "tbl_municipio"
    );