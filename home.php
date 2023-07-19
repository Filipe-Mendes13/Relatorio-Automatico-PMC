<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        :root {
            --rosa-escuro: #BF4080;
        }
        
        * {
            padding: 0px;
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: linear-gradient(to bottom, #f5f5f5, #e0e0e0);
            height: 70vh;
        }
        
        header {
            display: flex;
            width: 100%;
            height: 200px;
            background-image: linear-gradient(to top, var(--rosa-escuro) 60%, #fff 50%);
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            overflow: hidden;
        }

        header > img.logo {
            padding-top: 50px;
            padding-left: 30px;
            align-self: flex-start;
            justify-self: center;
        }

        .container-logout {
            position: absolute;
            left: 98%;
            bottom: 0;
        }

        .logout {
            margin-left: -34px;
            margin-bottom: 4px;
        }

        .botao {
            transition: .5s;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 290px;
        }

        h1 {
            color: var(--rosa-escuro);
            font-size: 30px;
            margin-bottom: 30px;
            text-align: center;
        }

        .botoes {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px; /* Espaçamento horizontal entre as figuras */
        }

        .formulario, .pesquisa, .relatorio {
            display: flex;
            height: 256px;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 3px 12px gray;
            border-radius: 50%;
        }

        .botoes {
            transition: .5s;
        }

        .formulario:hover, .pesquisa:hover, .relatorio:hover{
            opacity: 70%;
        }

        figcaption {
            margin-top: 20px;
            color: var(--rosa-escuro);
            font-size: larger;
            text-align: center;
        }

        footer {
            width: 100%;
            text-align: center;
            color: #fff;
            font-size: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            position: fixed;
            bottom: 0;
            background-color: var(--rosa-escuro);
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            color: yellow;
        }
    </style>
</head>
<body>
    <header>
        <img class="logo" src="img/logo_mobile.png" alt="icone prefeitura">
        <div class="container-logout">
            <a href="http://localhost/site/relatorio/logout.php">
                <img class="logout" src="img/logout.png" alt="Sair">
            </a>
        </div>
        <nav>
        </nav>
    </header>
    <main>
        <h1>Para Onde Deseja Navegar:</h1>
        <div class="botoes">
            <div class="formulario">
                <figure>
                    <a href="form.php">
                        <img class="botao" src="img/btn_form.png" alt="">
                    </a>
                    <figcaption>Formulário</figcaption>
                </figure>
            </div> 
            <div class="pesquisa">
                <figure>
                    <a href="consulta.php">
                        <img class="botao" src="img/search.png" alt="">
                    </a>
                    <figcaption>Pesquisa</figcaption>
                </figure>
            </div>
            <div class="relatorio">
                <figure>
                    <a href="relatorio.php">
                        <img class="botao" src="img/report.png" alt="">
                    </a>
                    <figcaption>Relatorio</figcaption>
                </figure>
            </div>  
        </div>
    </main>
    <footer>
        Copyright © 2023 | All rights reserved -
        <a href="https://github.com/Filipe-Mendes13">Filipe Mendes</a>
    </footer>
</body>
</html>
