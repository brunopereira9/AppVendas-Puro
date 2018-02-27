<?php
    include_once('../ConectaDB.php');

    $nomeTabela = "tbl_cadastro";
    $camposTabela = "id INT(10) AUTO_INCREMENT NOT NULL,
                     id_empresa INT(10) NOT NULL,
                     ativo VARCHAR(1) DEFAULT 'S' NOT NULL,
                     nome_completo VARCHAR(200) NOT NULL,
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
                     listar_para_usuarios VARCHAR(1) DEFAULT 'S' NOT NULL,
                     eh_usuarios VARCHAR(1) DEFAULT 'N' NOT NULL,
                     eh_cliente VARCHAR(1) DEFAULT 'N' NOT NULL,
                     eh_fornecedor VARCHAR(1) DEFAULT 'N' NOT NULL,
                     cadastro_data DATETIME DEFAULT CURRENT_TIMESTAMP,
                     cadastro_usuario VARCHAR(200),
                     cadastro_usuario_id INT(10),
                     observacao VARCHAR(1000),
                     PRIMARY KEY (id)";

    $db = new ConectaDB();
    $db->criaTabela($nomeTabela,$camposTabela);

?>