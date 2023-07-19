<?php
    session_start();
    include('conexao.php');

    if((!isset($_SESSION['login']) == true)){

        unset($_SESSION['login']);
        header('Location: login.php');
    }
    else{
        $logado = $_SESSION['login'];

        //pmat
        $sql_pmat = "SELECT * FROM `pmat`";

        $result_pmat = $con->query($sql_pmat);

        //red
        $sql_red = "SELECT * FROM `red`";

        $result_red = $con->query($sql_red);

        //intervencao
        $sql_intervencao = "SELECT * FROM `intervencao`";

        $result_intervencao = $con->query($sql_intervencao);

        //ação
        $sql_acao = "SELECT * FROM `acao`";

        $result_acao = $con->query($sql_acao);

        //status
        $sql_status = "SELECT * FROM `status`";

        $result_status = $con->query($sql_status);

        //historico
        $sql_historico = "SELECT * FROM `historico`";

        $result_historico = $con->query($sql_historico);

        //publicações
        $sql_publicacoes = "SELECT * FROM `publicacoes`";

        $result_publicacoes = $con->query($sql_publicacoes);

        //Item de Uso
        $sql_item_uso = "SELECT * FROM `item_uso`";

        $result_item_uso = $con->query($sql_item_uso);

        //contrato
        $sql_contrato = "SELECT * FROM `contrato`";

        $result_contrato= $con->query($sql_contrato);

        //Licitação
        $sql_licitacao = "SELECT * FROM `licitacao`";

        $result_licitacao = $con->query($sql_licitacao);

        //empenho
        $sql_empenho= "SELECT * FROM `empenho`";

        $result_empenho = $con->query($sql_empenho);

        //modalidade
        $sql_modalidade = "SELECT * FROM `modalidade`";

        $result_modalidade = $con->query($sql_modalidade);

        //Nota Fiscal
        $sql_nota_fiscal = "SELECT * FROM `nota_fiscal`";

        $result_nota_fiscal = $con->query($sql_nota_fiscal);

        //Item NF
        $sql_item_nf = "SELECT * FROM `item_nf`";

        $result_item_nf = $con->query($sql_item_nf);

        //fonte
        $sql_fonte = "SELECT * FROM `fonte`";

        $result_fonte = $con->query($sql_fonte);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="cons.css">
</head>
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
        </nav>
    </header>
    <main> 
        <?php
                if (isset($_GET['erro'])) {
                    $erro = $_GET['erro'];
                    echo '<div class="mensagem-erro"><strong>' . $erro . '</strong></div>';
                }
            ?>
            <section  id="PMAT">
                <fieldset> <!-- PMAT -->
                    <legend>PMAT</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número PMAT</th>
                            <th>Descrição PMAT</th>
                            <th>Nome do Projeto</th>
                            <th>Número do Contrato PMAT</th>
                            <th>Data de Assinatura</th>
                            <th>Valor Total</th>
                            <th>Valor de Contrapartida</th>
                            <th>Valor de Empréstimo</th>
                            <th>Nome da Secretaria Responsável</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_pmat = mysqli_fetch_assoc($result_pmat)){
                                    echo "<tr>";
                                    echo "<td>".$dados_pmat['num_pmat']. "</td>";
                                    echo "<td>".$dados_pmat['desc_pmat']. "</td>";
                                    echo "<td>".$dados_pmat['nom_projeto']. "</td>";
                                    echo "<td>".$dados_pmat['num_contrato_pmat']. "</td>";
                                    echo "<td>".$dados_pmat['dt_assinatura']. "</td>";
                                    echo "<td>".$dados_pmat['vir_total']. "</td>";
                                    echo "<td>".$dados_pmat['vlr_contrapartida']. "</td>";
                                    echo "<td>".$dados_pmat['vlr_emprestimo']. "</td>";
                                    echo "<td>".$dados_pmat['nom_secretaria_resp']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    //echo "<a href='http://localhost/site/relatorio/api/edit_pmat.php?id=$dados_pmat[num_pmat]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=pmat&id=$dados_pmat[num_pmat]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=pmat&id=$dados_pmat[num_pmat]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="10">
                                <a href="api/download.php?banco=pmat"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="RED">
                <fieldset> <!-- RED -->
                    <legend>RED</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número RED</th>
                            <th>Número PMAT</th>
                            <th>Data Inicial RED</th>
                            <th>Data Final RED</th>
                            <th>Data da Entrega</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_red = mysqli_fetch_assoc($result_red)){
                                    echo "<tr>";
                                    echo "<td>".$dados_red['num_red']. "</td>";
                                    echo "<td>".$dados_red['num_pmat']. "</td>";
                                    echo "<td>".$dados_red['dt_red_inicial']. "</td>";
                                    echo "<td>".$dados_red['dt_red_final']. "</td>";
                                    echo "<td>".$dados_red['dt_entrega']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=red&id=$dados_red[num_red]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=red&id=$dados_red[num_red]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="6">
                                <a href="api/download.php?banco=red"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="INTERVENCAO">
                <fieldset> <!-- INTERVENÇÃO -->
                    <legend>INTERVENÇÃO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número da Intervenção Atual</th>
                            <th>Número PMAT</th>
                            <th>Número da Intervenção Anterior</th>
                            <th>Descrição da Intervenção</th>
                            <th>Nome do Responsável</th>
                            <th>Nome da Secretaria</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_intervencao = mysqli_fetch_assoc($result_intervencao)){
                                    echo "<tr>";
                                    echo "<td>".$dados_intervencao['num_intervencao_atual']. "</td>";
                                    echo "<td>".$dados_intervencao['num_pmat']. "</td>";
                                    echo "<td>".$dados_intervencao['num_intervencao_anterior']. "</td>";
                                    echo "<td>".$dados_intervencao['desc_intervencao']. "</td>";
                                    echo "<td>".$dados_intervencao['nom_responsavel']. "</td>";
                                    echo "<td>".$dados_intervencao['nom_secretaria']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=intervencao&id=$dados_intervencao[num_intervencao_atual]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=intervencao&id=$dados_intervencao[num_intervencao_atual]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="7">
                                <a href="api/download.php?banco=intervencao"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="STATUS">
                <fieldset> <!-- STATUS -->
                    <legend>STATUS</legend>
                    <table class="tabela">
                        <thead>
                            <th>Código do Status</th>
                            <th>Descrição do Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_status = mysqli_fetch_assoc($result_status)){
                                    echo "<tr>";
                                    echo "<td>".$dados_status['cod_status']. "</td>";
                                    echo "<td>".$dados_status['desc_status']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=status&id=$dados_status[cod_status]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=status&id=$dados_status[cod_status]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="3">
                            <a href="api/download.php?banco=status"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="ACAO">
                <fieldset> <!-- AÇÃO -->
                    <legend>AÇÃO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número da Ação Atual</th>
                            <th>Número da Intervenção</th>
                            <th>Número da Intervenção Anterior</th>
                            <th>Descrição da Ação</th>
                            <th>Código do Item de Uso</th>
                            <th>Código do Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_acao = mysqli_fetch_assoc($result_acao)){
                                    echo "<tr>";
                                    echo "<td>".$dados_acao['num_acao_atual']. "</td>";
                                    echo "<td>".$dados_acao['num_intervecao']. "</td>";
                                    echo "<td>".$dados_acao['num_acao_anterior']. "</td>";
                                    echo "<td>".$dados_acao['desc_acao']. "</td>";
                                    echo "<td>".$dados_acao['cod_itemuso']. "</td>";
                                    echo "<td>".$dados_acao['cod_status']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=acao&id=$dados_acao[num_acao_atual]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=acao&id=$dados_acao[num_acao_atual]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="7">
                                <a href="api/download.php?banco=acao"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="HISTORICO">
                <fieldset> <!-- HISTÓRICO -->
                    <legend>HISTÓRICO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número da Sequênica do Histórico</th>
                            <th>Número da Ação</th>
                            <th>Descrição do Histórico</th>
                            <th>Data do Histórico</th>
                            <th>Número da Repactuação</th>
                            <th>Data da Repactuação</th>
                            <th>Número RED</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_historico = mysqli_fetch_assoc($result_historico)){
                                    echo "<tr>";
                                    echo "<td>".$dados_historico['num_seq_hist']. "</td>";
                                    echo "<td>".$dados_historico['num_acao']. "</td>";
                                    echo "<td>".$dados_historico['desc_historico']. "</td>";
                                    echo "<td>".$dados_historico['dt_historico']. "</td>";
                                    echo "<td>".$dados_historico['num_repactuacao']. "</td>";
                                    echo "<td>".$dados_historico['dt_repactuacao']. "</td>";
                                    echo "<td>".$dados_historico['num_red']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=historico&id=$dados_historico[num_seq_hist]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=historico&id=$dados_historico[num_seq_hist]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="8">
                                <a href="api/download.php?banco=historico"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="PUBLICACOES">
                <fieldset> <!-- PUBLICAÇÕES -->
                    <legend>PUBLICAÇÕES</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número DOC</th>
                            <th>Número da Ação</th>
                            <th>Descrição da Publicação</th>
                            <th>Data da Publicação</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_publicacoes = mysqli_fetch_assoc($result_publicacoes)){
                                    echo "<tr>";
                                    echo "<td>".$dados_publicacoes['num_DOC']. "</td>";
                                    echo "<td>".$dados_publicacoes['num_acao']. "</td>";
                                    echo "<td>".$dados_publicacoes['desc_publicacao']. "</td>";
                                    echo "<td>".$dados_publicacoes['dt_publicacao']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=publicacoes&id=$dados_publicacoes[num_DOC]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=publicacoes&id=$dados_publicacoes[num_DOC]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="5">
                                <a href="api/download.php?banco=publicacoes"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="ITEMUSO">
                <fieldset> <!-- ITEM DE USO -->
                    <legend>ITEM DE USO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Código Item de Uso</th>
                            <th>Descrição Item de Uso</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_item_uso = mysqli_fetch_assoc($result_item_uso)){
                                    echo "<tr>";
                                    echo "<td>".$dados_item_uso['cod_itemuso']. "</td>";
                                    echo "<td>".$dados_item_uso['desc_itemuso']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=item_uso&id=$dados_item_uso[cod_itemuso]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=item_uso&id=$dados_item_uso[cod_itemuso]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="3">
                                <a href="api/download.php?banco=item_uso"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="CONTRATO">
                <fieldset>  <!-- CONTRATO -->
                    <legend>CONTRATO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número do Contrato</th>
                            <th>Número da Ação</th>
                            <th>Data de assinatura</th>
                            <th>Nome do Fornecedor</th>
                            <th>CNPJ do Fornecedor</th>
                            <th>Descrição do Objeto</th>
                            <th>Valor do contrato</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                            <th>Número do PA</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_contrato = mysqli_fetch_assoc($result_contrato)){
                                    echo "<tr>";
                                    echo "<td>".$dados_contrato['num_contrato']. "</td>";
                                    echo "<td>".$dados_contrato['num_acao']. "</td>";
                                    echo "<td>".$dados_contrato['dt_assinatura']. "</td>";
                                    echo "<td>".$dados_contrato['nom_fornecedor']. "</td>";
                                    echo "<td>".$dados_contrato['cnpj_fornecedor']. "</td>";
                                    echo "<td>".$dados_contrato['desc_objeto']. "</td>";
                                    echo "<td>".$dados_contrato['vir_contrato']. "</td>";
                                    echo "<td>".$dados_contrato['dt_inicial']. "</td>";
                                    echo "<td>".$dados_contrato['dt_final']. "</td>";
                                    echo "<td>".$dados_contrato['num_PA']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=contrato&id=$dados_contrato[num_contrato]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=contrato&id=$dados_contrato[num_contrato]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="11">
                                <a href="api/download.php?banco=contrato"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="LICITACAO">
                <fieldset> <!-- LICITAÇÃO -->
                    <legend>LICITAÇÃO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número da PA</th>
                            <th>Número do Edital</th>
                            <th>Código da Modalidade</th>
                            <th>Número da Modalidade</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_licitacao = mysqli_fetch_assoc($result_licitacao)){
                                    echo "<tr>";
                                    echo "<td>".$dados_licitacao['num_PA ']. "</td>";
                                    echo "<td>".$dados_licitacao['num_edital']. "</td>";
                                    echo "<td>".$dados_licitacao['cod_modalidade ']. "</td>";
                                    echo "<td>".$dados_licitacao['num_modalidade']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=licitacao&id=$dados_licitacao[num_PA]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=licitacao&id=$dados_licitacao[num_PA]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="5">
                                <a href="api/download.php?banco=licitacao"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="MODALIDADE">
                <fieldset> <!-- MODALIDAE -->
                    <legend>MODALIDADE</legend>
                    <table class="tabela">
                        <thead>
                            <th>Código da Modalidade</th>
                            <th>Descrição da Modalidade</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_modalidade = mysqli_fetch_assoc($result_modalidade)){
                                    echo "<tr>";
                                    echo "<td>".$dados_modalidade['cod_modalidade']. "</td>";
                                    echo "<td>".$dados_modalidade['desc_modalidade']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=modalidade&id=$dados_modalidade[cod_modalidade]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=modalidade&id=$dados_modalidade[cod_modalidade]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="3">
                                <a href="api/download.php?banco=modalidade"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="EMPENHO">
                <fieldset> <!-- EMPENHO -->
                    <legend>EMPENHO</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número do Empenho</th>
                            <th>Número do Contrato</th>
                            <th>Data do Empenho</th>
                            <th>Valor do Empenho</th>
                            <th>Valor do Saldo Cancelado</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_empenho = mysqli_fetch_assoc($result_empenho)){
                                    echo "<tr>";
                                    echo "<td>".$dados_empenho['num_empenho']. "</td>";
                                    echo "<td>".$dados_empenho['num_contrato']. "</td>";
                                    echo "<td>".$dados_empenho['dt_empenho']. "</td>";
                                    echo "<td>".$dados_empenho['vlr_empenho']. "</td>";
                                    echo "<td>".$dados_empenho['vlr_saldocancelado']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=empenho&id=$dados_empenho[num_empenho]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=empenho&id=$dados_empenho[num_empenho]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="6">
                            <a href="api/download.php?banco=empenho"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="NOTAFISCAL">
                <fieldset> <!-- NOTA FISCAL -->
                    <legend>NOTA FISCAL</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número da Nota Fiscal</th>
                            <th>Número do Empenho</th>
                            <th>Data de Emissão</th>
                            <th>Valor da Nota Fiscal</th>
                            <th>Número NAP</th>
                            <th>Data NAP</th>
                            <th>Data do Pagamento</th>
                            <th>Valor do Pagamento Líquido</th>
                            <th>Número RED</th>
                            <th>Código Orçamentário</th>
                            <th>Código de Despesa</th>
                            <th>Código Fonte</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_nota_fiscal = mysqli_fetch_assoc($result_nota_fiscal)){
                                    echo "<tr>";
                                    echo "<td>".$dados_nota_fiscal['num_nf']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['num_empenho']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['dt_emissao']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['vlr_nf']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['num_nap']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['dt_nap']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['dt_pagto']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['vlr_pagto_liquido']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['num_red']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['cod_orcamento']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['cod_despesa']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['cod_fonte ']. "</td>";
                                    echo "<td>".$dados_nota_fiscal['desc_breve']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=nota_fiscal&id=$dados_nota_fiscal[num_nf]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=nota_fiscal&id=$dados_nota_fiscal[num_nf]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="14">
                            <a href="api/download.php?banco=nota_fiscal"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="ITEMNF">
                <fieldset> <!-- ITEM NF -->
                    <legend>ITEM NOTA FISCAL</legend>
                    <table class="tabela">
                        <thead>
                            <th>Número do Item</th>
                            <th>Número da NF</th>
                            <th>Número do Patrimônio</th>
                            <th>st_foto_entregue</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_item_nf = mysqli_fetch_assoc($result_item_nf)){
                                    echo "<tr>";
                                    echo "<td>".$dados_item_nf['num_item']. "</td>";
                                    echo "<td>".$dados_item_nf['num_nf']. "</td>";
                                    echo "<td>".$dados_item_nf['num_patrimonio']. "</td>";
                                    echo "<td>".$dados_item_nf['st_foto_entregue']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=item_nf&id=$dados_item_nf[num_item]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=item_nf&id=$dados_item_nf[num_item]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="5">
                                <a href="api/download.php?banco=item_nf"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="FONTE">
                <fieldset> <!-- FONTE -->
                    <legend>FONTE</legend>
                    <table class="tabela">
                        <thead>
                            <th>Código Fonte</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                while($dados_fonte = mysqli_fetch_assoc($result_fonte)){
                                    echo "<tr>";
                                    echo "<td>".$dados_fonte['cod_fonte']. "</td>";
                                    echo "<td>".$dados_fonte['desc_fonte']. "</td>";
                                    echo "<td class='acoes-cell' colspan='2'>";
                                    echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=fonte&id=$dados_fonte[cod_fonte]'><img src='img/edit.png' alt=''></a>";
                                    echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=fonte&id=$dados_fonte[cod_fonte]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="3">
                                <a href="api/download.php?banco=fonte"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
    </main>
    <footer>Copyright © 2023 | All rights reserved - <a href="https://github.com/Filipe-Mendes13">Filipe Mendes</a></footer>
</body>
</html>