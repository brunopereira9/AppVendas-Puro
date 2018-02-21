<?php
    include_once ('../index.php');
    include_once ('../criptografia.php');

    $nome_completo          = "'GILBERTO BRUNO DA CRUZ PEREIRA'";
    $nome_fantasia          = "'BRUNO PEREIRA'";
    $pessoa_f_j             = "'F'";
    $cpf_cnpj               = "'05812349100'";
    $rg_ssp                 = "'0940508849'";
    $data_nascimento        = "'1996/02/13'";
    $telefone_principal     = "'67991085386'";
    $email_principal        = "'brunno.pereira7@gmail.com'";
    $pessoa_contato         = "'BRUNO PEREIRA'";
    $endereco_municipio_cod = "'5002704'";
    $listar_para_usuarios   = "'S'";
    $eh_usuarios            = "'S'";
    $eh_cliente             = "'N'";
    $eh_fornecedor          = "'S'";
    $observacao             = "'Fornecedor Sistema'";

    $query = $db->query("SELECT nome_completo FROM tbl_cadastro WHERE nome_completo = $nome_completo");
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($query->rowCount() == 0) {
        $sql = "INSERT INTO tbl_cadastro (nome_completo,
                                        nome_fantasia,
                                        pessoa_f_j,
                                        cpf_cnpj,
                                        rg_ssp,
                                        data_nascimento,
                                        telefone_principal,
                                        email_principal,
                                        pessoa_contato,
                                        endereco_municipio_cod,
                                        listar_para_usuarios,
                                        eh_usuarios,
                                        eh_cliente,
                                        eh_fornecedor,
                                        observacao)
  
                                VALUES ($nome_completo,
                                        $nome_fantasia,
                                        $pessoa_f_j,
                                        $cpf_cnpj,
                                        $rg_ssp,
                                        $data_nascimento,
                                        $telefone_principal,
                                        $email_principal,
                                        $pessoa_contato,
                                        $endereco_municipio_cod,
                                        $listar_para_usuarios,
                                        $eh_usuarios,
                                        $eh_cliente,
                                        $eh_fornecedor,
                                        $observacao)";
        $db->exec($sql);

        $cadastro_id = 1;
        $login = criptPadrao("admin");
        $senha = criptPadrao("bruno754");
        $senha_confirma = $senha;
        $grupo_liberacao_id = 1;

        $sql = "INSERT INTO tbl_usuario (cadastro_id,
                                       login,
                                       senha,
                                       senha_confirma,
                                       grupo_liberacao_id)
  
                                VALUES ($cadastro_id,
                                        '$login',
                                        '$senha',
                                        '$senha_confirma',
                                        $grupo_liberacao_id)";
        $db->exec($sql);

        $acesso_adm = "'S'";
        $libera_cadastrar_pessoa = "'S'";
        $libera_editar_pessoa = "'S'";
        $libera_deletar_pessoa = "'S'";
        $libera_visualizar_pessoa = "'S'";
        $libera_venda_balcao = "'S'";
        $libera_venda_pedido = "'S'";
        $libera_venda_comanda = "'S'";
        $libera_venda_desconto = "'S'";
        $libera_venda_desconto_acima_teto = "'S'";
        $visualiza_venda_propia = "'N'";
        $libera_venda_edita = "'S'";
        $libera_venda_cancela = "'S'";

        $sql = "INSERT INTO tbl_grupo_liberacao (acesso_adm,
                                       libera_cadastrar_pessoa,
                                       libera_editar_pessoa,
                                       libera_deletar_pessoa,
                                       libera_visualizar_pessoa,
                                       libera_venda_balcao,
                                       libera_venda_pedido,
                                       libera_venda_comanda,
                                       libera_venda_desconto,
                                       libera_venda_desconto_acima_teto,
                                       visualiza_venda_propia,
                                       libera_venda_edita,
                                       libera_venda_cancela)
  
                                VALUES ($acesso_adm,
                                        $libera_cadastrar_pessoa,
                                        $libera_editar_pessoa,
                                        $libera_deletar_pessoa,
                                        $libera_visualizar_pessoa,
                                        $libera_venda_balcao,
                                        $libera_venda_pedido,
                                        $libera_venda_comanda,
                                        $libera_venda_desconto,
                                        $libera_venda_desconto_acima_teto,
                                        $visualiza_venda_propia,
                                        $libera_venda_edita,
                                        $libera_venda_cancela)";
        $db->exec($sql);
    }

    echo 'Dados inseridos';