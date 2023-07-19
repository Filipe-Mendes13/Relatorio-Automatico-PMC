<?php
/*

__/\\\\\\\\\\\\\____/\\\\____________/\\\\_____/\\\\\\\\\_____/\\\\\\\\\\\\\\\_        
 _\/\\\/////////\\\_\/\\\\\\________/\\\\\\___/\\\\\\\\\\\\\__\///////\\\/////__       
  _\/\\\_______\/\\\_\/\\\//\\\____/\\\//\\\__/\\\/////////\\\_______\/\\\_______      
   _\/\\\\\\\\\\\\\/__\/\\\\///\\\/\\\/_\/\\\_\/\\\_______\/\\\_______\/\\\_______     
    _\/\\\/////////____\/\\\__\///\\\/___\/\\\_\/\\\\\\\\\\\\\\\_______\/\\\_______    
     _\/\\\_____________\/\\\____\///_____\/\\\_\/\\\/////////\\\_______\/\\\_______   
      _\/\\\_____________\/\\\_____________\/\\\_\/\\\_______\/\\\_______\/\\\_______  
       _\/\\\_____________\/\\\_____________\/\\\_\/\\\_______\/\\\_______\/\\\_______ 
        _\///______________\///______________\///__\///________\///________\///________

        Autor: Filipe Mendes
        Status: Em construção
        Data da última modificação: 04/07/2023

        Fase: Preencher o banco de dados de acordo com os campos solicitados.

                                                                        
    */
    

    //inicia sessão
    session_start();

    //verifica se foi acessado pelo submit ou pela URL
    if(isset($_POST['submit']) || isset($_POST['submitImg'])){

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //chama o script de conexão
        include_once('conexao.php');

        //PMAT

        $num_pmat = $_POST["num_pmat"]; 
        $descPmat = $_POST["descPmat"]; 
        $nom_projeto = $_POST["nom_projeto"]; 
        $num_contrato_pmat = $_POST["num_contrato_pmat"]; 
        $dt_assinatura = $_POST["dt_assinatura"]; 
        $vlr_total = $_POST["vlr_total"]; 
        $vlr_contrapartida = $_POST["vlr_contrapartida"]; 
        $vlr_emprestimo = $_POST["vlr_emprestimo"]; 
        $nom_secretaria_resp = $_POST["nom_secretaria_resp"];



        //RED

        $num_pmatR = $_POST["num_pmatR"]; 
        $NumRed = $_POST["NumRed"]; 
        $dt_red_inicial = $_POST["dt_red_inicial"]; 
        $dt_red_final = $_POST["dt_red_final"]; 
        $dt_entrega = $_POST["dt_entrega"]; 



        //INTERVENÇÃO

        $num_intervencao_atual = $_POST["num_intervencao_atual"]; 
        $num_intervencao_anterior = $_POST["num_intervencao_anterior"]; 
        $desc_intervencao = $_POST["desc_intervencao"]; 
        $num_pmatI = $_POST["num_pmatI"]; 
        $nom_responsavel = $_POST["nom_responsavel"];
        $nom_secretaria = $_POST['nom_secretaria'];



        //STATUS

        $cod_status = $_POST["cod_status"]; 
        $desc_status = $_POST["desc_status"];



        //AÇÃO

        $num_acao_atual = $_POST["num_acao_atual"]; 
        $num_intervencaoA = $_POST["num_intervencaoA"]; 
        $num_acao_anterior = $_POST["num_acao_anterior"]; 
        $desc_acao = $_POST["desc_acao"]; 
        $cod_itemusoA = $_POST["cod_itemusoA"];
        $cod_statusA = $_POST['cod_statusA'];


        //HISTÓRICO
        
        $num_seq_hist = $_POST["num_seq_hist"]; 
        $num_acaoH = $_POST["num_acaoH"]; 
        $desc_historico = $_POST["desc_historico"]; 
        $dt_historico = $_POST["dt_historico"]; 
        $num_repactuacao = $_POST["num_repactuacao"];
        $dt_repactuacao = $_POST['dt_repactuacao'];
        $num_redH = $_POST['num_redH'];



        //PUBLICAÇÕES

        $num_DOC = $_POST["num_DOC"]; 
        $num_acaoP = $_POST["num_acaoP"]; 
        $desc_publicacao = $_POST["desc_publicacao"]; 
        $dt_publicacao = $_POST["dt_publicacao"];
        
        

        //ITEM DE USO

        $cod_itemuso = $_POST["cod_itemuso"]; 
        $desc_itemuso = $_POST["desc_itemuso"]; 



        //CONTRATO

        $num_acaoC = $_POST["num_acaoC"]; 
        $num_contrato = $_POST["num_contrato"]; 
        $dt_assinaturaC = $_POST["dt_assinaturaC"]; 
        $nom_fornecedor = $_POST["nom_fornecedor"]; 
        $cnpj_fornecedor = $_POST["cnpj_fornecedor"];
        $desc_objeto = $_POST['desc_objeto'];
        $vlr_contrato = $_POST['vlr_contrato'];
        $dt_inicial = $_POST['dt_inicial'];
        $dt_final = $_POST['dt_final'];
        $num_PA_Contrato = $_POST['num_PA_Contrato'];



        //LICITAÇÃO

        $num_PA = $_POST["num_PA"]; 
        $num_edital = $_POST["num_edital"]; 
        $cod_modalidade_Licitação = $_POST["cod_modalidade_Licitação"]; 
        $num_modalidade = $_POST["num_modalidade"];


        //MODALIDADE

        $cod_modalidade = $_POST["cod_modalidade"]; 
        $desc_modalidade = $_POST["desc_modalidade"];



        //EMPENHO

        $num_empenho = $_POST["num_empenho"]; 
        $num_contrato_Empenho = $_POST["num_contrato_Empenho"]; 
        $dt_empenho = $_POST["dt_empenho"]; 
        $vlr_empenho = $_POST["vlr_empenho"]; 
        $vlr_saldocancelado = $_POST["vlr_saldocancelado"];



        //NOTA FISCAL
        
        $num_nf = $_POST["num_nf"]; 
        $num_empenho_NF = $_POST["num_empenho_NF"]; 
        $dt_emissao = $_POST["dt_emissao"]; 
        $vlr_nf = $_POST["vlr_nf"]; 
        $num_nap = $_POST["num_nap"];
        $dt_nap = $_POST['dt_nap'];
        $dt_pagto = $_POST['dt_pagto'];
        $vlr_pagto_liquido = $_POST['vlr_pagto_liquido'];
        $num_redNF = $_POST['num_redNF'];
        $cod_orcamentario = $_POST['cod_orcamentario'];
        $cod_despesa = $_POST['cod_despesa'];
        $cod_fonte_NF = $_POST['cod_fonte_NF'];
        $desc_breve = $_POST['desc_breve'];



        //ITEM NOTA FISCAL

        $num_item = $_POST["num_item"]; 
        $num_nf_ITEM = $_POST["num_nf_ITEM"]; 
        $num_patrimonio = $_POST["num_patrimonio"]; 
        $st_foto_entregue = $_POST["st_foto_entregue"];
        
        

        //FONTE

        $cod_fonte = $_POST["cod_fonte"]; 
        $desc_fonte = $_POST["desc_fonte"]; 


        //MENSAGEM
        $alert= [];
        $historico_erro= [];
        $banco_faill= [];
        $count_erro= 0;
        $count_acerto= 0;


        //INSERT PMAT
        if($num_pmat != ""){

            $banco = "PMAT";
            $sql = ("INSERT INTO `pmat`(`num_pmat`, `desc_pmat`, `nom_projeto`, `num_contrato_pmat`, `dt_assinatura`, `vir_total`, `vlr_contrapartida`, `vlr_emprestimo`, `nom_secretaria_resp`) VALUES ('$num_pmat','$descPmat','$nom_projeto','$num_contrato_pmat','$dt_assinatura',' $vlr_total','$vlr_contrapartida','$vlr_emprestimo',' $nom_secretaria_resp')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array 
                    $alert[0] = $banco;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[0]= $erro;
                $banco_faill[0]= $banco.": ";
                $count_erro++;

            }

        }


        //INSERT RED
        if($NumRed != ""){

            $banco = "RED";
            $sql = ("INSERT INTO `red`(`num_red`, `num_pmat`, `dt_red_inicial`, `dt_red_final`, `dt_entrega`) VALUES ('$NumRed','$num_pmatR','$dt_red_inicial','$dt_red_final','$dt_entrega')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[1] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[1]= $erro;
                $banco_faill[1]= $banco.": ";
                $count_erro++;

            }
        }


        //INSERT INTERVENÇÃO
        if($num_intervencao_atual != ""){

            $banco = "INTERVENÇÃO";
            $sql = ("INSERT INTO `intervencao`(`num_intervencao_atual`, `num_pmat`, `num_intervencao_anterior`, `desc_intervencao`, `nom_responsavel`, `nom_secretaria`) VALUES ('$num_intervencao_atual','$num_pmatI','$num_intervencao_anterior','$desc_intervencao','$nom_responsavel','$nom_secretaria')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[2] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }


        }


        //INSERT STATUS
        if($cod_status != ""){

            $banco = "STATUS";
            $sql = ("INSERT INTO `status`(`cod_status`, `desc_status`) VALUES ('$cod_status','$desc_status')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[3] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[3]= $erro;
                $banco_faill[3]= $banco.": ";
                $count_erro++;

            }


        }

        //INSERT AÇÃO
        if($num_acao_atual != ""){

            $banco = "AÇÃO";
            $sql = ("INSERT INTO `acao`(`num_acao_atual`, `num_intervecao`, `num_acao_anterior`, `desc_acao`, `cod_itemuso`, `cod_status`) VALUES ('$num_acao_atual','$num_intervencaoA','$num_acao_anterior','$desc_acao','$cod_itemusoA','$cod_statusA')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[4] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }


        }


        //INSERT HISTÓRICO
        if($num_seq_hist != ""){

            $banco = "HISTÓRICO";
            $sql = ("INSERT INTO `historico`(`num_seq_hist`, `num_acao`, `desc_historico`, `dt_historico`, `num_repactuacao`, `dt_repactuacao`, `num_red`) VALUES ('$num_seq_hist','$num_acaoH','$desc_historico','$dt_historico','$num_repactuacao','$dt_repactuacao','$num_redH')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[5] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }


        }


        //INSERT PUBLICAÇÕES
        if($num_DOC != ""){

            $banco = "PUBLICAÇÕES";
            $sql = ("INSERT INTO `publicacoes`(`num_DOC`, `num_acao`, `desc_publicacao`, `dt_publicacao`) VALUES ('$num_DOC','$num_acaoP',' $desc_publicacao','$dt_publicacao')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[6] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

        }


        //INSERT ITEM DE USO
        if($cod_itemuso != ""){

            $banco = "ITEM DE USO";
            $sql = ("INSERT INTO `item_uso`(`cod_itemuso`, `desc_itemuso`) VALUES ('$cod_itemuso','$desc_itemuso')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[7] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

        }

         //INSERT CONTRATO
         if($num_contrato != ""){

            $banco = "CONTRATO";
            $sql = ("INSERT INTO `contrato`(`num_contrato`, `num_acao`, `dt_assinatura`, `nom_fornecedor`, `cnpj_fornecedor`, `desc_objeto`, `vir_contrato`, `dt_inicial`, `dt_final`, `num_PA`) VALUES ('$num_contrato','$num_acaoC','$dt_assinaturaC',' $nom_fornecedor','$cnpj_fornecedor','$desc_objeto','$vlr_contrato','$dt_inicial','$dt_final','$num_PA_Contrato')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[7] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

        }

        //INSERT LICITAÇÃO
        if($num_PA != ""){

            $banco = "LICITAÇÃO";
            $sql = ("INSERT INTO `licitacao`(`num_PA`, `num_edital`, `cod_modalidade`, `num_modalidade`) VALUES ('$num_PA','$num_edital','$cod_modalidade_Licitação','$num_modalidade')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[8] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

            

        }

        //INSERT LICITAÇÃO
        if($num_PA != ""){

            $banco = "LICITAÇÃO";
            $sql = ("INSERT INTO `licitacao`(`num_PA`, `num_edital`, `cod_modalidade`, `num_modalidade`) VALUES ('$num_PA','$num_edital','$cod_modalidade_Licitação','$num_modalidade')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[8] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

            

        }


        //INSERT MODALIDADE
        if($cod_modalidade != ""){

            $banco = "MODALIDADE";
            $sql = ("INSERT INTO `modalidade`(`cod_modalidade`, `desc_modalidade`) VALUES ('$cod_modalidade','$desc_modalidade')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[9] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }


        }


        //INSERT EMPENHO
        if($num_empenho != ""){

            $banco = "EMPENHO";
            $sql = ("INSERT INTO `empenho`(`num_empenho`, `num_contrato`, `dt_empenho`, `vlr_empenho`, `vlr_saldocancelado`) VALUES (' $num_empenho','$num_contrato_Empenho','$dt_empenho','$vlr_empenho','$vlr_saldocancelado')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[10] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }


        }

        //INSERT NOTA FISCAL
        if($num_nf != ""){

            $banco = "NOTA FISCAL";
            $sql = ("INSERT INTO `nota_fiscal`(`num_nf`, `num_empenho`, `dt_emissao`, `vlr_nf`, `num_nap`, `dt_nap`, `dt_pagto`, `vlr_pagto_liquido`, `num_red`, `cod_orcamento`, `cod_despesa`, `cod_fonte`, `desc_breve`) VALUES ('$num_nf','$num_empenho_NF','$dt_emissao','$vlr_nf','$num_nap','$dt_nap','$dt_pagto','$vlr_pagto_liquido','$num_redNF','$cod_orcamentario','$cod_despesa','$cod_fonte_NF','$desc_breve')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[11] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

        }

        //INSERT ITEM NOTA FISCAL
        if($num_item != ""){

            $banco = "ITEM NOTA FISCAL";
            $sql = ("INSERT INTO `item_nf`(`num_item`, `num_nf`, `num_patrimonio`, `st_foto_entregue`) VALUES ('$num_item','$num_nf_ITEM','$num_patrimonio','$st_foto_entregue')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[12] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

        }

        //INSERT FONTE
        if($cod_fonte != ""){

            $banco = "FONTE";
            $sql = ("INSERT INTO `fonte`(`cod_fonte`, `desc_fonte`) VALUES ('$cod_fonte','$desc_fonte')");


            try {
                // Tentativa de executar o comando SQL
                $result = mysqli_query($con, $sql);
            
                if ($result) {
                    // O comando SQL foi executado com sucesso, salva a mensagem de acertou no array
                    $mensagem = $banco;
                    $alert[12] = $mensagem;
                    $count_acerto++;
                    
                } else {
                    // O comando SQL não foi executado com sucesso
                    throw new Exception(mysqli_error($con));
                }
            } catch (Exception $e) {
                // Captura a exceção e redireciona de volta para a página form.php com o erro na URL
                $erro = $e->getMessage();
                $historico_erro[2]= $erro;
                $banco_faill[2]= $banco.": ";
                $count_erro++;

            }

        }


        //FEEDBACK PARA O USUARIO
        
        $erro = "Ocorreu o(s) seguinte(s) erro(s) no(s) banco(s): " . $banco_faill[0] . urlencode($historico_erro[0]) . $banco_faill[1] . urlencode($historico_erro[1]) . $banco_faill[2] . urlencode($historico_erro[2]) . $banco_faill[3] . urlencode($historico_erro[3]) . $banco_faill[4] . urlencode($historico_erro[4]) . $banco_faill[5] . urlencode($historico_erro[5]) . $banco_faill[6] . urlencode($historico_erro[6]) . $banco_faill[7] . urlencode($historico_erro[7]) . $banco_faill[8] . urlencode($historico_erro[8]) . $banco_faill[9] . urlencode($historico_erro[9]) . $banco_faill[10] . urlencode($historico_erro[10]) . $banco_faill[11] . urlencode($historico_erro[11]) . $banco_faill[12] . urlencode($historico_erro[12]) . $banco_faill[13] . urlencode($historico_erro[13]) . $banco_faill[14] . urlencode($historico_erro[14]);

        $sucesso = "Dados enviados no(s) banco(s): " . urlencode($alert[0] . " " . $alert[1] . " " . $alert[2] . " " . $alert[3] . " " . $alert[4] . " " . $alert[5] . " " . $alert[6] . " " . $alert[7] . " " . $alert[8] . "      " . $alert[9] . " " . $alert[10] . " " . $alert[11] . " " . $alert[12] . " " . $alert[13] . " " . $alert[14]);

        
        $url = "form.php?erro=" . $erro . "&sucesso=" . $sucesso;

        if($count_acerto < 1 and $count_erro > 0){
            header("Location: form.php?erro=" . $erro);
        }elseif($count_acerto > 0 and $count_erro < 1){
            header("Location: form.php?sucesso=" . $sucesso);
        }else{
            header("Location: " . $url);
        }

    }
    else{
        //acesso via URL proibido, retorna ao Login
        header('Location: login.php');
    }
?>