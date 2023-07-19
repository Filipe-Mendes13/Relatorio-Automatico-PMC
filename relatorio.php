<?php
    session_start();
    include('conexao.php');

    if((!isset($_SESSION['login']) == true)){

        unset($_SESSION['login']);
        header('Location: login.php');
    }
    else{
        $logado = $_SESSION['login'];

        //relatorio de nota fiscal
        $sql_nota = "SELECT c.nom_fornecedor AS EMITENTE, nf.num_nf AS NUMERO, nf.dt_emissao AS DATA_EMISSÂO, nf.vlr_nf AS VALOR, nf.dt_pagto DATA_PAGAMENTO, iu.desc_itemuso AS RUBRICA FROM contrato c JOIN empenho e ON c.num_contrato = e.num_contrato JOIN nota_fiscal nf ON e.num_empenho = nf.num_empenho JOIN acao a ON c.num_acao = a.num_acao_atual JOIN item_uso iu ON a.cod_itemuso =  iu.cod_itemuso;";

        $result_nota = $con->query($sql_nota);


        // Relatorio Quadro Fornecedores
        $sql_quadro = "SELECT c.cnpj_fornecedor AS 'CNPJ do Fornecedor', c.nom_fornecedor AS 'Fornecedor', COUNT(nf.num_nf) AS 'Qtd Notas', SUM(nf.vlr_nf) AS 'Valor das Notas'
        FROM contrato c
        JOIN empenho e ON c.num_contrato = e.num_contrato
        JOIN nota_fiscal nf ON e.num_empenho = nf.num_empenho;";

        $result_quadro = $con->query($sql_quadro);

       
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
            <a class="menu-link" href="#NF">Nota Fiscal</a>
            <a class="menu-link" href="#QF">Quadro de Fornecedores</a>
            
        </nav>
    </header>
    <main> 
        <?php
                if (isset($_GET['erro'])) {
                    $erro = $_GET['erro'];
                    echo '<div class="mensagem-erro"><strong>' . $erro . '</strong></div>';
                }
            ?>
            <section  id="NF">
                <fieldset> <!-- PMAT -->
                    <legend>Relatório Nota Fiscal</legend>
                    <table class="tabela">
                        <thead>
                            <th>Emitente</th>
                            <th>Numero</th>
                            <th>Data de Emissão</th>
                            <th>Valor</th>
                            <th>Data do Pagamento</th>
                            <th>Rubrica</th>
                            <!--<th>Ações</th>-->
                        </thead>
                        <tbody>
                            <?php
                                while($dados_pmat = mysqli_fetch_assoc($result_nota)){
                                    echo "<tr>";
                                    echo "<td>".$dados_pmat['EMITENTE']. "</td>";
                                    echo "<td>".$dados_pmat['NUMERO']. "</td>";
                                    echo "<td>".$dados_pmat['DATA_EMISSÂO']. "</td>";
                                    echo "<td>".$dados_pmat['VALOR']. "</td>";
                                    echo "<td>".$dados_pmat['DATA_PAGAMENTO']. "</td>";
                                    echo "<td>".$dados_pmat['RUBRICA']. "</td>";
                                    //echo "<td class='acoes-cell' colspan='2'>";
                                    //echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=pmat&id=$dados_pmat[num_pmat]'><img src='img/edit.png' alt=''></a>";
                                    //echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=pmat&id=$dados_pmat[num_pmat]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="7">
                                <a href="api/download_relatorio.php?relatorio=nota_fiscal"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
            <section  id="QF">
                <fieldset> <!-- RED -->
                    <legend>Relatório Quadro de Fornecedores</legend>
                    <table class="tabela">
                        <thead>
                            <th>CNPJ do Fornecedor</th>
                            <th>Fornecedor</th>
                            <th>Qtd Notas Fiscais</th>
                            <th>Valor das Notas</th>
                            <!--<th>Ações</th>-->
                        </thead>
                        <tbody>
                            <?php
                                while($dados_red = mysqli_fetch_assoc($result_quadro)){
                                    echo "<tr>";
                                    echo "<td>".$dados_red['CNPJ do Fornecedor']. "</td>";
                                    echo "<td>".$dados_red['Fornecedor']. "</td>";
                                    echo "<td>".$dados_red['Qtd Notas']. "</td>";
                                    echo "<td>".$dados_red['Valor das Notas']. "</td>";
                                    echo "<td>".$dados_red['dt_entrega']. "</td>";
                                   // echo "<td class='acoes-cell' colspan='2'>";
                                    //echo "<a href='http://localhost/site/relatorio/api/edit.php?banco=red&id=$dados_red[num_red]'><img src='img/edit.png' alt=''></a>";
                                    //echo "<a href='http://localhost/site/relatorio/api/delete.php?banco=red&id=$dados_red[num_red]'><img src='img/delete.png' alt=''></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="5">
                                <a href="api/download_relatorio.php?relatorio=quadro_fornecedores"><img src="img/sheets.png" alt="Footer" style="float: right;"></a>
                            </td>
                        </tfoot>
                    </table>
                </fieldset>
            </section>
    </main>
    <footer>Copyright © 2023 | All rights reserved - <a href="https://github.com/Filipe-Mendes13">Filipe Mendes</a></footer>
</body>
</html>