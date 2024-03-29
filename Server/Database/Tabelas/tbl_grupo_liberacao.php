<?php
include_once('../ConectaDB.php');

    $nomeTabela = "tbl_grupo_liberacao";
    $camposTabela = "id INT(10) UNSIGNED AUTO_INCREMENT,
                     id_empresa INT(10) NOT NULL,
                     acesso_descricao VARCHAR(100),
                     acesso_adm VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_cadastrar_pessoa VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_editar_pessoa VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_deletar_pessoa VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_visualizar_pessoa VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_venda_balcao VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_venda_pedido VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_venda_comanda VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_venda_desconto VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_venda_desconto_acima_teto VARCHAR(1) DEFAULT 'N' NOT NULL,
                     visualiza_venda_propia VARCHAR(1) DEFAULT 'S' NOT NULL,
                     libera_venda_edita VARCHAR(1) DEFAULT 'N' NOT NULL,
                     libera_venda_cancela VARCHAR(1) DEFAULT 'N' NOT NULL,
                     PRIMARY KEY (id)";

    $db = new ConectaDB();
    $db->criaTabela($nomeTabela,$camposTabela);