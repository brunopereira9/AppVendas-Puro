<?php
    include_once('../ConectaDB.php');

    $sql = "CREATE TABLE IF NOT EXISTS tbl_empresa
            (
              id INT(10) AUTO_INCREMENT NOT NULL,
              ativo VARCHAR(1) DEFAULT 'S' NOT NULL,
              razao_social VARCHAR(200) NOT NULL,
              nome_fantasia VARCHAR(200),
              pessoa_f_j VARCHAR(1),
              cpf_cnpj VARCHAR(20),
              rg_ssp VARCHAR(50),
              inscricao_estadual VARCHAR(50),
              data_nascimento DATE,
              telefone_principal VARCHAR(20),
              telefone_um VARCHAR(20),
              email_principal VARCHAR(200),
              pessoa_contato VARCHAR(200),
              endereco VARCHAR(200),
              endereco_numero VARCHAR(100),
              endereco_complemento VARCHAR(100),
              endereco_bairro VARCHAR(200),
              endereco_municipio_cod VARCHAR(20),
              endereco_cep VARCHAR(20),
              cadastro_data DATETIME DEFAULT CURRENT_TIMESTAMP,
              cadastro_usuario VARCHAR(200),
              cadastro_usuario_id INT(10),
              licenca_software VARCHAR(200),
              observacao VARCHAR(1000),
              PRIMARY KEY (id)
            )";

    $db = new ConectaDB();
    $db = $db->conectaDb();
    $db->exec($sql);

?>