<?php
require_once 'init.php';

if (isset($_GET['acao']) && isset($_GET['id'])) {
    $acao = $_GET['acao'];
    $id_alvo = $_GET['id'];

    foreach ($_SESSION['produtos'] as $indice => &$produto) {
        if ($produto['id'] == $id_alvo) {
            if ($acao == 'adicionar') {
                $produto['estoque'] += 1;
            } elseif ($acao == 'remover') {
                if ($produto['estoque'] > 0) {
                    $produto['estoque'] -= 1;
                }
            } elseif ($acao == 'deletar') {
                unset($_SESSION['produtos'][$indice]);
            }
            break;
        }
    }
    
    if ($acao == 'deletar') {
        $_SESSION['produtos'] = array_values($_SESSION['produtos']);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
    
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventario.css">
    <link rel="icon" type="image/x-icon" href="imagens/Logo.png">
    <title>Inventário - ConstruTech</title>
</head>
<body>
    <?php require_once 'partials/header.php'; ?>
    <main>
        <div class="pagina-inventario">
            <div class="tabela-total">
                <table class="tabela">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th>Investimento</th>
                        <th>Retorno</th>
                        <th>Id do Produto</th>
                        <th>Ações</th> 
                    </tr>
                    <?php
                    $total_retorno_geral = 0;
                    $total_investimento_geral = 0; 
                    $total_itens_estoque = 0;      

                    if (!empty($_SESSION['produtos'])) {
                        foreach($_SESSION['produtos'] as $produto){
                            
                           
                            $preco_limpo = str_replace(',', '.', $produto['preco']);
                            $investimento_limpo = str_replace(',', '.', $produto['investimento']);
                            
                            
                            $totalLinhaRetorno = (float)$preco_limpo * (int)$produto['estoque'];
                            
                           
                            $total_investimento_geral += (float)$investimento_limpo;
                            $total_itens_estoque += (int)$produto['estoque'];
                            $total_retorno_geral += $totalLinhaRetorno;

                            $status_estoque = ''; 
                            if ($produto['estoque'] < 10) {
                                $status_estoque = 'alerta_severo_estoque';
                            } elseif ($produto['estoque'] < 30) {
                                $status_estoque = 'alerta_estoque';
                            }

                            echo '<tr>  
                                    <td>'.$produto['nome'].'</td>
                                    <td>R$ '.number_format((float)$preco_limpo, 2, ',', '.').'</td>
                                    <td>'.$produto['categoria'].'</td>
                                    <td class="'.$status_estoque.'">'.$produto['estoque'].'</td>
                                    <td>R$ '.number_format((float)$investimento_limpo, 2, ',', '.').'</td>
                                    <td>R$ '.number_format($totalLinhaRetorno, 2, ',', '.').'</td>
                                    <td>'.$produto['id'].'</td>
                                    <td>
                                        <a href="?acao=adicionar&id='.$produto['id'].'" class="botao-acao-mais">➕</a>
                                        <a href="?acao=remover&id='.$produto['id'].'" class="botao-acao-menos">➖</a>
                                        <a href="?acao=deletar&id='.$produto['id'].'" class="botao-acao-deletar">🗑️</a>
                                    </td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="8">Nenhum produto cadastrado.</td></tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <h1>Resumo do Estoque</h1>
        <div class="footer-completo">
            <div class="parte-footer">
                <h3>Investimento Total</h3>
                <p>R$ <?php echo number_format($total_investimento_geral, 2, ',', '.'); ?></p>
            </div>

            <div class="linha-footer"></div>

            <div class="parte-footer">
                <h3>Quantidade em Estoque</h3>
                <p><?php echo $total_itens_estoque; ?> unidades</p>
            </div>

            <div class="linha-footer"></div>

            <div class="parte-footer">   
                <h3>Retorno Total Esperado</h3>
                <p>R$ <?php echo number_format($total_retorno_geral, 2, ',', '.'); ?></p>
            </div>

            <div class="linha-footer"></div>

            <div class="parte-footer-legenda">
                <h3>Legenda</h3>
                <p>⬛Preto: Estoque estável</p>
                <p>🟨Amarelo: Estoque baixo</p>
                <p>🟥Vermelho: Estoque quase inexistente</p>
            </div>
        </div>
    </footer>
</body>
</html>