<?php
    require_once 'init.php';

    $categoria_get = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="imagens/Logo.png">
    <title>ConstruTech</title>
</head>
<body>
    <?php
        require_once 'partials/header.php';
    ?>

    <main>

        <div class="filtro-categorias">
            <a href="index.php" class="botao-categoria">Todos</a>
            <?php
                foreach($categoria as $kcat => $nome){
                    echo '<a  href="index.php?categoria='. $kcat .'" class="botao-categoria">'. $nome .'</a>';
                }
            ?>
        </div>

        <div class="produtos-main">
            <?php
                foreach($_SESSION['produto'] as $produtos){
                    if ($categoria_get === '' || $produto['categoria']===$categoria_get){

                    }
                }
            
            ?>
            <div class="produtos">
                <article class="card">
                    <img src="imagens/Cimento50kg.svg">
                    <div class="linha-card"></div>
                    <h3>Cimento</h3>
                    <h3>Bruto</h3>
                    <h3>R$35,00</h3>
                    <p>Estoque: 20</p>
                </article>

                <article class="card">
                    <img src="imagens/ColherPedreiro.svg">
                    <div class="linha-card"></div>
                    <h3>Colher de Pedreiro</h3>
                    <h3>Ferramenta</h3>
                    <h3>R$26,00</h3>
                    <p>Estoque: 40</p>
                </article>

                <article class="card">
                    <img src="imagens/PorcelanatoOrtiz.svg">
                    <div class="linha-card"></div>
                    <h3>Porcelanato Ortiz Cinza Acetinado Retificado 120x120cm</h3>
                    <h3>Acabamento</h3>
                    <h3>R$42,00</h3>
                    <p>Estoque: 60</p>
                </article>

                <article class="card">
                    <img src="imagens/Argamassa.svg">
                    <div class="linha-card"></div>
                    <h3>Argamassa 20kg</h3>
                    <h3>Bruto</h3>
                    <h3>R$25,00</h3>
                    <p>Estoque: 67</p>
                </article>

                <article class="card">
                    <img src="imagens/Parafusadeira.svg">
                    <div class="linha-card"></div>
                    <h3>Furadeira e Parafusadeira - Makita</h3>
                    <h3>Ferramenta</h3>
                    <h3>R$550,00</h3>
                    <p>Estoque: 16</p>
                </article>

                <article class="card">
                    <img src="imagens/NivelaLaser.svg">
                    <div class="linha-card"></div>
                    <h3>Nível a Laser Bosch</h3>
                    <h3>Ferramenta</h3>
                    <h3>R$670,00</h3>
                    <p>Estoque: 24</p>
                </article>

                <article class="card">
                    <img src="imagens/Rodape.svg">
                    <div class="linha-card"></div>
                    <h3>Rodapé Branco 10cm</h3>
                    <h3>Acabamento</h3>
                    <h3>R$20,00</h3>
                    <p>Estoque: 41</p>
                </article>

                <article class="card">
                    <img src="imagens/Revestimento.svg">
                    <div class="linha-card"></div>
                    <h3>Revestimento Ripado 30x90</h3>
                    <h3>Acabamento</h3>
                    <h3>R$135,00</h3>
                    <p>Estoque: 777</p>
                </article>
            </div>
        </div>
    </main>
</body>
</html>