<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <main>
        <div class="container">
            <img src="img/prefeitura2.png" alt="logo prefeitura contagem">
            <form action="validacao.php" method="post" autocomplete="off">
                <div class="txt-field">
                    <label class="labelUser" for="login">Usuário:</label>
                    <br>
                    <input class="inputUser" type="username" id="login" name="login" required>
                    <br><br>
                </div>
                <div class="txt-field">
                    <label class="labelUser" for="senha">Senha:</label>
                    <br>
                    <input class="inputUser" type="password" id="senha" name="senha" required>
                    <br><br>
                </div>
                <input class="botao" type="submit" name="submit" value="ENVIAR">
            </form>
            <?php
                if(isset($_GET['error'])){
                    echo '<p class="error">Login ou senha incorreto*</p>';
                }
            ?>
        </div>
    </main>
    <footer>Copyright © 2023 | All rights reserved - <a href="https://github.com/Filipe-Mendes13">Filipe Mendes</a></footer>
</body>
</html>