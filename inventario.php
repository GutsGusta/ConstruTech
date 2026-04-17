<?php
require_once 'init.php';

// --- LÓGICA DE AÇÕES (ADICIONAR, REMOVER, DELETAR) ---
if (isset($_GET['acao']) && isset($_GET['id'])) {
    $acao = $_GET['acao'];
    $id_alvo = $_GET['id'];

    foreach ($_SESSION['produtos'] as $indice => &$produto) {
        if ($produto['id'] == $id_alvo) {
            if ($acao == 'adicionar') {
                $produto['estoque'] += 1;
            } elseif ($acao == 'remover') {
                // Garante que o estoque não fique negativo
                if ($produto['estoque'] > 0) {
                    $produto['estoque'] -= 1;
                }
            } elseif ($acao == 'deletar') {
                // Remove o produto do array de sessão
                unset($_SESSION['produtos'][$indice]);
            }
            break; // Interrompe o loop pois já achamos e processamos o produto
        }
    }
    
    // Reorganiza os índices do array após deletar
    if ($acao == 'deletar') {
        $_SESSION['produtos'] = array_values($_SESSION['produtos']);
    }

    // Redireciona para a mesma página limpando a URL (evita reenvio ao atualizar a página)
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
    <style>
        /* Estilos básicos para os botões ficarem apresentáveis */
        .btn-acao {
            padding: 2px 8px;
            margin: 0 2px;
            cursor: pointer;
            text-decoration: none;
            color: black;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn-deletar {
            background-color: #ffcccc;
            border-color: #ff0000;
        }
    </style>
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
                        <th>Ações</th> </tr>
                    <?php
                    $total = 0;
                    
                    // Verifica se existem produtos antes de fazer o loop
                    if (!empty($_SESSION['produtos'])) {
                        foreach($_SESSION['produtos'] as $produto){
                            $totalLinha = $produto['preco'] * $produto['estoque'];
                            $status_estoque = ''; // Inicializando a variável vazia

                            // Ajuste na lógica de status do estoque
                            if ($produto['estoque'] < 10) {
                                $status_estoque = 'alerta_severo_estoque';
                            } elseif ($produto['estoque'] < 30) {
                                $status_estoque = 'alerta_estoque';
                            }

                            echo '<tr>  
                                    <td>'.$produto['nome'].'</td>
                                    <td>R$'.$produto['preco'].'</td>
                                    <td>'.$produto['categoria'].'</td>
                                    <td class="'.$status_estoque.'">'.$produto['estoque'].'</td>
                                    <td>R$'.$produto['investimento'].'</td>
                                    <td>R$'.$totalLinha.'</td>
                                    <td>'.$produto['id'].'</td>
                                    <td>
                                        <a href="?acao=adicionar&id='.$produto['id'].'" class="btn-acao">+</a>
                                        <a href="?acao=remover&id='.$produto['id'].'" class="btn-acao">-</a>
                                        <a href="?acao=deletar&id='.$produto['id'].'" class="btn-acao btn-deletar">Deletar</a>
                                    </td>
                            </tr>';
                            $total += $totalLinha;
                        }
                    } else {
                        echo '<tr><td colspan="8">Nenhum produto cadastrado.</td></tr>';
                    }
                    ?>
                </table>
            </div> <div class="lucro-container">
                <?php
                    echo '<h1> Lucro total</h1>';
                    $lucro_total = 0;   
                    
                    if (!empty($_SESSION['produtos'])) {
                        // O seu código original somava a coluna 'retorno', mas a variável gerada no loop era $totalLinha
                        // Assumindo que a chave 'retorno' exista no seu array base. Se não existir, mude para 'investimento' ou algo compatível.
                        foreach(array_column($_SESSION['produtos'], 'retorno') as $valor) {
                            $lucro_total += $valor;
                        }
                    }
                    print 'R$ ' . $lucro_total;
                ?>
            </div>
        </div>
    </main>

    <footer>
        </footer>
</body>
</html>