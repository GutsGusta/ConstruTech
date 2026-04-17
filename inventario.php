<?php
require_once 'init.php'
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
    <?php
        require_once 'partials/header.php';
    ?>
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
					</tr>
				<?php
					$total = 0;
					$status_estoque = null;
						foreach($_SESSION['produtos'] as $produto){
						$totalLinha = $produto['preco']*$produto['estoque'];
						if ($produto['estoque'] < 30) {
						$status_estoque = 'alerta_estoque';
						}
						elseif($produto['estoque'] < 10){
						$status_estoque = 'alerta_severo_estoque';
						}
						echo '<tr>	
								<td>'.$produto['nome'].'</td>
								<td>R$'.$produto['preco'].'</td>
								<td>'.$produto['categoria'].'</td>
								<td class='.$status_estoque.'>'.$produto['estoque'].'</td>
								<td>R$'.$produto['investimento'].'</td>
								<td>R$'.$totalLinha.'</td>
								<td>'.$produto['id'].'</td>
						</tr>';
						$total +=$totalLinha;
					}
					?>
				<!-- <p>Lucro Total <?php print $total; ?></p> -->
			</div>
							<?php
					$lucro_total = null;	
					foreach(array_column($_SESSION['produtos'], 'retorno') as $valor)
					{
						$lucro_total += $valor;
					}
						print $lucro_total;
		?>
		</div>
	</footer>
</body>
