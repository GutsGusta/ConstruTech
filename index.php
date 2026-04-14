<?php
require_once 'init.php';

if (isset($_GET['produtoadd']) && $_GET['produtoadd']=='1') {
    print '<h1>Produto adicionado com sucesso!!!</h1>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="imagens/Logo.png">
    <title>Produtos - ConstruTech</title>
</head>
<body>
    <?php
        require_once 'partials/header.php';
    ?>
    <main>
        <div class="filtro-categorias">
            <a href="index.php" class="botao-categoria">Todos</a>
            <?php
                foreach($categorias as $kcat => $nome){
                    echo '<a  href="index.php?categoria='. $kcat .'" class="botao-categoria">'. $nome .'</a>';
                }
            ?>
        </div>
        <div class="produtos-main">
            <div class="produtos">
                <?php
                    foreach($_SESSION['produtos'] as $produtos){
                            echo '<article class="card">
                                    <img src="'.$produtos['imagem'].'">
                                    <div class="linha-card"></div>
                                    <h3>'.$produtos['nome'].'</h3>
                                    <h3>'.$produtos['categoria'].'</h3>
                                    <h3>R$'.$produtos['preco'].',00</h3>
                                    <p>Estoque: '.$produtos['estoque'].'</p>
                                    </article>';
                        } 
		?>
            </div>
        </div>
    </main>
</body>
</html>
