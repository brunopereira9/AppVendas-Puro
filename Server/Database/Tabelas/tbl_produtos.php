<?php
    include_once('../ConectaDB.php');

    $nomeTabela = "tbl_produtos";
    $camposTabela = "id INT(10) AUTO_INCREMENT NOT NULL,
                     id_empresa INT(10) NOT NULL,
                     id_unidade_medida INT(10) NOT NULL,
                     ativo VARCHAR(1) DEFAULT 'S' NOT NULL,
                     nome_produto VARCHAR(200) NOT NULL,
                     id_grupo INT(10) NOT NULL,
                     id_sub_grupo INT(10) NOT NULL,
                     valor_unitario DECIMAL(10,4) NOT NULL,
                     cod_de_barras VARCHAR(20),
                     cod_ncm VARCHAR(20),
                     cod_cest VARCHAR(20),
                     desconto_max_perc DECIMAL(10,4),
                     desconto_promocao_perc DECIMAL(10,4),
                     movimenta_estoque VARCHAR(1) DEFAULT 'S' NOT NULL,
                     eh_mult_empresa VARCHAR(1) DEFAULT 'N' NOT NULL,
                     eh_promocao VARCHAR(1) DEFAULT 'N' NOT NULL,
                     eh_pesavel VARCHAR(1) DEFAULT 'N' NOT NULL,
                     eh_uso_proprio VARCHAR(1) DEFAULT 'N' NOT NULL,
                     eh_materia_prima VARCHAR(1) DEFAULT 'N' NOT NULL,
                     cadastro_data DATETIME DEFAULT CURRENT_TIMESTAMP,
                     cadastro_usuario VARCHAR(200),
                     cadastro_usuario_id INT(10),
                     observacao VARCHAR(1000),
                     PRIMARY KEY (id),
                     CONSTRAINT fk_id_empresa_produto 
                     FOREIGN KEY (id_empresa) 
                     REFERENCES tbl_empresa (id)";

    $db = new ConectaDB();
    $db->criaTabela($nomeTabela,$camposTabela);

?>