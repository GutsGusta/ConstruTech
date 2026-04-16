<?php
    require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="icon" type="image/x-icon" href="imagens/Logo.png">
    <title>Login - ConstruTech</title>
</head>
<body>
    <?php
        require_once 'partials/header.php';
    ?>
    <main>
        <div class="main-form">
            <form action="index.php" method="post" class="formulario">
                <p>Nome do Usuário</p>
                <input type="text" class="campo-form">
                <p>Senha</p>
                <input type="password" class="campo-form">
                <button type="submit" class="botao-enviar">Entrar</button>
            </form>
        </div>
    </main>
</body>
</html>