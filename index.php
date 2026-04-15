<?php
require_once 'init.php';
$categoria_get = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';
// print_r($_SESSION['produtos']);
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

        <h1 class="titulo">Produtos da Loja</h1>
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
                         if ($categoria_get === '' || $produtos['categoria']===$categoria_get){
                            if ($produtos['estoque'] == 0) {
                                print '<article class="card">
                                    <img src="'.$produtos['imagem'].'">
                                    <div class="linha-card"></div>
                                    <h3>'.$produtos['nome'].'</h3>
                                    <h3>'.$produtos['categoria'].'</h3>
                                    <h3>R$'.$produtos['preco'].'</h3>
                                    <p class="fora-estoque">Estoque: Produto fora do estoque</p>
                                    </article>';
                            }
                            else {
                                print '<article class="card">
                                    <img src="'.$produtos['imagem'].'">
                                    <div class="linha-card"></div>
                                    <h3>'.$produtos['nome'].'</h3>
                                    <h3>'.$produtos['categoria'].'</h3>
                                    <h3>R$'.$produtos['preco'].'</h3>
                                    <p>Estoque: '.$produtos['estoque'].'</p>
                                    </article>';
                            }

                        } 
                    }
		        ?>
            </div>
        </div>
    </main>
</body>
</html>
