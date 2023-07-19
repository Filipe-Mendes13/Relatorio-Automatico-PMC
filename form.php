<?php
    //inicia sessão
    session_start();


    //valida se existe uma sessão em andamento
    if((!isset($_SESSION['login'])== true)){
        //se não existir deleta a variavel sessão e retorna a tela de login
        unset($_SESSION['login']);
        header('Location: login.php');
    }else{
        $logado = $_SESSION['login'];
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de Dados</title>

</head>
<link rel="stylesheet" href="form.css">
<body>
    <header>
        <img class="logo" src="img/logo_mobile.png" alt="icone prefeitura">
        <?php
            echo '<h1>Bem-vinda '.$logado.'</h1>';
        ?>
        <div class="container-logout">
            <a href="http://localhost/site/relatorio/logout.php"><img class="logout" src="img/logout.png" alt="Sair"></a>
            <a href="http://localhost/site/relatorio/home.php"><img class="icon-form" src="img/home.png" alt=""></a>
        </div>
        <nav>
            <a class="menu-link" href="#PMAT">PMAT</a>
            <a class="menu-link" href="#RED">RED</a>
            <a class="menu-link" href="#INTERVENCAO">INTERVENÇÃO</a>
            <a class="menu-link" href="#STATUS">STATUS</a>
            <a class="menu-link" href="#ACAO">AÇÃO</a>
            <a class="menu-link" href="#HISTORICO">HISTÓRICO</a>
            <a class="menu-link" href="#PUBLICACOES">PUBLICAÇÕES</a>
            <a class="menu-link" href="#ITEMUSO">ITEM DE USO</a>
            <a class="menu-link" href="#CONTRATO">CONTRATO</a>
            <a class="menu-link" href="#LICITACAO">LICITAÇÃO</a>
            <a class="menu-link" href="#MODALIDADE">MODALIDADE</a>
            <a class="menu-link" href="#EMPENHO">EMPENHO</a>
            <a class="menu-link" href="#NOTAFISCAL">NOTA FISCAL</a>
            <a class="menu-link" href="#ITEMNF">ITEM NOTA FISCAL</a>
            <a class="menu-link" href="#FONTE">FONTE</a>
            <a class="menu-link" href="#enviar">ENVIAR DADOS</a>
        </nav>
    </header>
    <main> 
        <form id="formulario" action="insert.php" method="POST">
        <?php
            if (isset($_GET['erro'])) {
                $erro = $_GET['erro'];
                echo '<div class="mensagem-erro"><strong>' . $erro . '</strong></div>';
            }

            if (isset($_GET['sucesso'])) {
                $sucesso = $_GET['sucesso'];
                echo '<div class="mensagem-sucesso"><strong>' . $sucesso .'</strong></div>';
            }

        ?>
            <section  id="PMAT">
                <fieldset> <!-- PMAT -->
                    <legend>PMAT</legend>
                    <div class="inputBox">
                        <label for="num_pmat">Número PMAT</label>
                        <input type="number" name="num_pmat" id="num_pmat" min="0">
                    </div>
                    <div class="inputBox">
                        <label for="descPmat">Descrição PMAT</label>
                        <input type="text" name="descPmat" id="descPmat" maxlength="200">
                    </div>
                    <div class="inputBox">
                        <label for="nom_projeto">Nome do Projeto</label>
                        <input type="text" name="nom_projeto" id="nom_projeto" maxlength="200">
                    </div>
                    <div class="inputBox">
                        <label for="num_contrato_pmat">Número do Contrato PMAT</label>
                        <input type="text" name="num_contrato_pmat" id="num_contrato_pmat" maxlength="200" step="0.01" min="0">
                    </div>
                    <div class="inputBox">
                        <label for="dt_assinatura">Data de Assinatura</label>
                        <input type="date" name="dt_assinatura" id="dt_assinatura">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_total">Valor Total do PMAT</label>
                        <input type="number" name="vlr_total" id="vlr_total" step="0.01">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_contrapartida">Valor Contrapartida do PMAT</label>
                        <input type="number" name="vlr_contrapartida" id="vlr_contrapartida" step="0.01">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_emprestimo">Valor Empréstimo</label>
                        <input type="number" name="vlr_emprestimo" id="vlr_emprestimo" step="0.01">
                    </div>
                    <div class="inputBox">
                        <label for="nom_secretaria_resp">Nome Secretaria responsável</label>
                        <input type="text" name="nom_secretaria_resp" id="nom_secretaria_resp" maxlength="200">
                    </div>
                </fieldset>
            </section>
            <section  id="RED">
                <fieldset> <!-- RED -->
                    <legend>RED</legend>
                    <div class="inputBox">
                        <label for="NumRed">Número RED</label>
                        <input type="number" name="NumRed" id="NumRed">
                    </div>
                    <div class="inputBox">
                        <label for="num_pmatR">Número PMAT</label>
                        <input type="number" name="num_pmatR" id="num_pmatR">
                    </div>
                    <div class="inputBox">
                        <label for="dt_red_inicial">Data Inicial</label>
                        <input type="date" name="dt_red_inicial" id="dt_red_inicial">
                    </div>
                    <div class="inputBox">
                        <label for="dt_red_final">Data Final</label>
                        <input type="date" name="dt_red_final" id="dt_red_final">
                    </div>
                    <div class="inputBox">
                        <label for="dt_entrega">Data de Entrega</label>
                        <input type="date" name="dt_entrega" id="dt_entrega">
                    </div>
                </fieldset>
            </section>
            <section  id="INTERVENCAO">
                <fieldset> <!-- INTERVENÇÃO -->
                    <legend>INTERVENÇÃO</legend>
                    <div class="inputBox">
                        <label for="num_intervencao_atual">Número da Intervenção</label>
                        <input type="number" name="num_intervencao_atual" id="num_intervencao_atual" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="num_intervencao_anterior">Número da Intervenção Anterior</label>
                        <input type="number" name="num_intervencao_anterior" id="num_intervencao_anterior" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="desc_intervencao">Descrição da Intervenção</label>
                        <input type="text" name="desc_intervencao" id="desc_intervencao" maxlength="200">
                    </div>
                    <div class="inputBox">
                        <label for="num_pmatI">Número PMAT</label>
                        <input type="number" name="num_pmatI" id="num_pmatI">
                    </div>
                    <div class="inputBox">
                        <label for="nom_responsavel">Nome do Responsável</label>
                        <input type="text" name="nom_responsavel" id="nom_responsavel" maxlength="200">
                    </div>
                    <div class="inputBox">
                        <label for="nom_secretaria">Nome da Secretária</label>
                        <input type="text" name="nom_secretaria" id="nom_secretaria" maxlength="200">
                    </div>
                </fieldset>
            </section>
            <section  id="STATUS">
                <fieldset> <!-- STATUS -->
                    <legend>STATUS</legend>
                    <div class="inputBox">
                        <label for="cod_status">Código do Status</label>
                        <input type="number" name="cod_status" id="cod_status">
                    </div>
                    <div class="inputBox">
                        <label for="desc_status">Descrição do Status</label>
                        <input type="text" name="desc_status" id="desc_status" maxlength="200">
                    </div>
                </fieldset>
            </section>
            <section  id="ACAO">
                <fieldset> <!-- AÇÃO -->
                    <legend>AÇÃO</legend>
                    <div class="inputBox">
                        <label for="num_acao_atual">Número da Ação</label>
                        <input type="number" name="num_acao_atual" id="num_acao_atual">
                    </div>
                    <div class="inputBox">
                        <label for="num_intervencaoA">Número da Intervenção</label>
                        <input type="number" name="num_intervencaoA" id="num_intervencaoA">
                    </div>
                    <div class="inputBox">
                        <label for="num_acao_anterior">Número da Ação Anterior</label>
                        <input type="number" name="num_acao_anterior" id="num_acao_anterior">
                    </div>
                    <div class="inputBox">
                        <label for="desc_acao">Descrição da Ação</label>
                        <input type="text" name="desc_acao" id="desc_acao" maxlength="200">
                    </div>
                    <div class="inputBox">
                        <label for="cod_itemusoA">Código Item de Uso</label>
                        <input type="text" name="cod_itemusoA" id="cod_itemusoA">
                    </div>
                    <div class="inputBox">
                        <label for="cod_statusA">Código do Status</label>
                        <input type="number" name="cod_statusA" id="cod_statusA">
                    </div>
                </fieldset>
            </section>
            <section  id="HISTORICO">
                <fieldset> <!-- HISTÓRICO -->
                    <legend>HISTÓRICO</legend>
                    <div class="inputBox">
                        <label for="num_seq_hist">Número da Sequênica do Histórico</label>
                        <input type="number" name="num_seq_hist" id="num_seq_hist">
                    </div>
                    <div class="inputBox">
                        <label for="num_acaoH">Número da Ação</label>
                        <input type="number" name="num_acaoH" id="num_acaoH">
                    </div>
                    <div class="inputBox">
                        <label for="desc_historico">Descrição do Histórico</label>
                        <input type="text" name="desc_historico" id="desc_historico">
                    </div>
                    <div class="inputBox">
                        <label for="dt_historico">Data do Histórico</label>
                        <input type="date" name="dt_historico" id="dt_historico">
                    </div>
                    <div class="inputBox">
                        <label for="num_repactuacao">Número da Repactuação</label>
                        <input type="number" name="num_repactuacao" id="num_repactuacao">
                    </div>
                    <div class="inputBox">
                        <label for="dt_repactuacao">Data da Repactuação</label>
                        <input type="date" name="dt_repactuacao" id="dt_repactuacao">
                    </div>
                    <div class="inputBox">
                        <label for="num_redH">Número RED</label>
                        <input type="number" name="num_redH" id="num_redH">
                    </div>
                </fieldset>
            </section>
            <section  id="PUBLICACOES">
                <fieldset> <!-- PUBLICAÇÕES -->
                    <legend>PUBLICAÇÕES</legend>
                    <div class="inputBox">
                        <label for="num_DOC">Número DOC</label>
                        <input type="number" name="num_DOC" id="num_DOC">
                    </div>
                    <div class="inputBox">
                        <label for="num_acaoP">Número da Ação</label>
                        <input type="number" name="num_acaoP" id="num_acaoP">
                    </div>
                    <div class="inputBox">
                        <label for="desc_publicacao">Descrição da Publicação</label>
                        <input type="text" name="desc_publicacao" id="desc_publicacao" maxlength="200">
                    </div>
                    <div class="inputBox">
                        <label for="dt_publicacao">Data da Publicação</label>
                        <input type="date" name="dt_publicacao" id="dt_publicacao">
                    </div>
                </fieldset>
            </section>
            <section  id="ITEMUSO">
                <fieldset> <!-- ITEM DE USO -->
                    <legend>ITEM DE USO</legend>
                    <div class="inputBox">
                        <label for="cod_itemuso">Código Item de Uso</label>
                        <input type="text" name="cod_itemuso" id="cod_itemuso">
                    </div>
                    <div class="inputBox">
                        <label for="desc_itemuso">Descrição Item de Uso</label>
                        <input type="text" name="desc_itemuso" id="desc_itemuso" maxlength="200">
                    </div>
                </fieldset>
            </section>
            <section  id="CONTRATO">
                <fieldset>  <!-- CONTRATO -->
                    <legend>CONTRATO</legend>
                    <div class="inputBox">
                        <label for="num_contrato">Número do Contrato</label>
                        <input type="text" name="num_contrato" id="num_contrato">
                    </div>
                    <div class="inputBox">
                        <label for="num_acaoC">Número da Ação</label>
                        <input type="number" name="num_acaoC" id="num_acaoC">
                    </div>
                    <div class="inputBox">
                        <label for="dt_assinaturaC">Data de assinatura</label>
                        <input type="date" name="dt_assinaturaC" id="dt_assinaturaC">
                    </div>
                    <div class="inputBox">
                        <label for="nom_fornecedor">Nome do Fornecedor</label>
                        <input type="text" name="nom_fornecedor" id="nom_fornecedor">
                    </div>
                    <div class="inputBox">
                        <label for="cnpj_fornecedor">CNPJ do Fornecedor</label>
                        <input type="text" name="cnpj_fornecedor" id="cnpj_fornecedor">
                    </div>
                    <div class="inputBox">
                        <label for="desc_objeto">Descrição do Objeto</label>
                        <input type="text" name="desc_objeto" id="desc_objeto">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_contrato">Valor do contrato</label>
                        <input type="number" name="vlr_contrato" id="vlr_contrato" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="dt_inicial">Data Inicial</label>
                        <input type="date" name="dt_inicial" id="dt_inicial">
                    </div>
                    <div class="inputBox">
                        <label for="dt_final">Data Final</label>
                        <input type="date" name="dt_final" id="dt_final">
                    </div>
                    <div class="inputBox">
                        <label for="num_PA_Contrato">Número do PA</label>
                        <input type="number" name="num_PA_Contrato" id="num_PA_Contrato">
                    </div>
                
                </fieldset>
            </section>
            <section  id="LICITACAO">
                <fieldset> <!-- LICITAÇÃO -->
                    <legend>LICITAÇÃO</legend>
                    <div class="inputBox">
                        <label for="num_PA">Número da PA</label>
                        <input type="number" name="num_PA" id="num_PA">
                    </div>
                    <div class="inputBox">
                        <label for="num_edital">Número do Edital</label>
                        <input type="number" name="num_edital" id="num_edital">
                    </div>
                    <div class="inputBox">
                        <label for="cod_modalidade_Licitação">Código da Modalidade</label>
                        <input type="number" name="cod_modalidade_Licitação" id="cod_modalidade_Licitação">
                    </div>
                    <div class="inputBox">
                        <label for="num_modalidade">Número da Modalidade</label>
                        <input type="number" name="num_modalidade" id="num_modalidade">
                    </div>
                </fieldset>
            </section>
            <section  id="MODALIDADE">
                <fieldset> <!-- MODALIDAE -->
                    <legend>MODALIDADE</legend>
                    <div class="inputBox">
                        <label for="cod_modalidade">Código da Modalidade</label>
                        <input type="number" name="cod_modalidade" id="cod_modalidade">
                    </div>
                    <div class="inputBox">
                        <label for="desc_modalidade">Descrição da Modalidade</label>
                        <input type="text" name="desc_modalidade" id="desc_modalidade">
                    </div>
                </fieldset>
            </section>
            <section  id="EMPENHO">
                <fieldset> <!-- EMPENHO -->
                    <legend>EMPENHO</legend>
                    <div class="inputBox">
                        <label for="num_empenho">Número do Empenho</label>
                        <input type="number" name="num_empenho" id="num_empenho">
                    </div>
                    <div class="inputBox">
                        <label for="num_contrato_Empenho">Número do Contrato</label>
                        <input type="text" name="num_contrato_Empenho" id="num_contrato_Empenho">
                    </div>
                    <div class="inputBox">
                        <label for="dt_empenho">Data do Empenho</label>
                        <input type="date" name="dt_empenho" id="dt_empenho">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_empenho">Valor do Empenho</label>
                        <input type="number" name="vlr_empenho" id="vlr_empenho" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_saldocancelado">Valor do Saldo Cancelado</label>
                        <input type="number" name="vlr_saldocancelado" id="vlr_saldocancelado" step="0.1">
                    </div>
                </fieldset>
            </section>
            <section  id="NOTAFISCAL">
                <fieldset> <!-- NOTA FISCAL -->
                    <legend>NOTA FISCAL</legend>
                    <div class="inputBox">
                        <label for="num_nf">Número da Nota Fiscal</label>
                        <input type="number" name="num_nf" id="num_nf">
                    </div>
                    <div class="inputBox">
                        <label for="num_empenho_NF">Número do Empenho</label>
                        <input type="number" name="num_empenho_NF" id="num_empenho_NF">
                    </div>
                    <div class="inputBox">
                        <label for="dt_emissao">Data de Emissão</label>
                        <input type="date" name="dt_emissao" id="dt_emissao">
                    </div>
                
                    <div class="inputBox">
                        <label for="vlr_nf">Valor da Nota Fiscal</label>
                        <input type="number" name="vlr_nf" id="vlr_nf" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="num_nap">Número NAP</label>
                        <input type="number" name="num_nap" id="num_nap">
                    </div>
                    <div class="inputBox">
                        <label for="dt_nap">Data NAP</label>
                        <input type="date" name="dt_nap" id="dt_nap">
                    </div>
                    <div class="inputBox">
                        <label for="dt_pagto">Data do Pagamento</label>
                        <input type="date" name="dt_pagto" id="dt_pagto">
                    </div>
                    <div class="inputBox">
                        <label for="vlr_pagto_liquido">Valor do Pagamento Líquido</label>
                        <input type="number" name="vlr_pagto_liquido" id="vlr_pagto_liquido" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="num_redNF">Número RED</label>
                        <input type="number" name="num_redNF" id="num_redNF" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="cod_orcamentario">Código Orçamentário</label>
                        <input type="number" name="cod_orcamentario" id="cod_orcamentario" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="cod_despesa">Código de Despesa</label>
                        <input type="number" name="cod_despesa" id="cod_despesa" step="0.1">
                    </div>
                    <div class="inputBox">
                        <label for="cod_fonte_NF">Código Fonte</label>
                        <input type="number" name="cod_fonte_NF" id="cod_fonte_NF">
                    </div>
                    <div class="inputBox">
                        <label for="desc_breve">Descrição</label>
                        <input type="text" name="desc_breve" id="desc_breve">
                    </div>
                </fieldset>
            </section>
            <section  id="ITEMNF">
                <fieldset> <!-- ITEM NF -->
                    <legend>ITEM NOTA FISCAL</legend>
                    <div class="inputBox">
                        <label for="num_item">Número do Item</label>
                        <input type="number" name="num_item" id="num_item">
                    </div>
                    <div class="inputBox">
                        <label for="num_nf_ITEM">Número da NF</label>
                        <input type="number" name="num_nf_ITEM" id="num_nf_ITEM">
                    </div>
                    <div class="inputBox">
                        <label for="num_patrimonio">Número do Patrimônio</label>
                        <input type="number" name="num_patrimonio" id="num_patrimonio">
                    </div>
                    <div class="inputBox">
                        <label for="st_foto_entregue">st_foto_entregue</label>
                        <input type="text" name="st_foto_entregue" id="st_foto_entregue">
                    </div>
                </fieldset>
            </section>
            <section  id="FONTE">
                <fieldset> <!-- FONTE -->
                    <legend>FONTE</legend>
                    <div class="inputBox">
                        <label for="cod_fonte">Código Fonte</label>
                        <input type="number" name="cod_fonte" id="cod_fonte">
                    </div>
                    <div class="inputBox">
                        <label for="desc_fonte">Descrição</label>
                        <input type="text" name="desc_fonte" id="desc_fonte">
                    </div>
                </fieldset>
            </section>
            <section id="enviar"><input class="botao" type="submit" name="submit" value="ENVIAR"></section>
           
        </form>

        <script>
            var inputsNumber = document.querySelectorAll('input[type="number"]');

            for (var i = 0; i < inputsNumber.length; i++) {
                inputsNumber[i].min = 0;
            }

            var menuLinks = document.querySelectorAll('.menu-link');

    // Adicione um manipulador de eventos para cada link
    menuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Remova a classe 'active' de todos os links do menu
            menuLinks.forEach(function(menuLink) {
                menuLink.classList.remove('active');
            });

            // Adicione a classe 'active' apenas ao link clicado
            this.classList.add('active');
        });
    });
        </script>
    </main>
    <footer>Copyright © 2023 | All rights reserved - <a href="https://github.com/Filipe-Mendes13">Filipe Mendes</a></footer>
</body>
</html>