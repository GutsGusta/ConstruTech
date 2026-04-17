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
						foreach($_SESSION['produtos'] as $produto){
						$totalLinha = $produto['preco']*$produto['estoque'];
						echo '<tr>	
								<td>'.$produto['nome'].'</td>
								<td>R$'.$produto['preco'].'</td>
								<td>'.$produto['categoria'].'</td>
								<td>'.$produto['estoque'].'</td>
								<td>R$'.$produto['investimento'].'</td>
								<td>R$'.$totalLinha.'</td>
								<td>'.$produto['id'].'</td>
						</tr>';
						$total +=$totalLinha;
					}
					?>
				<!-- <p>Lucro Total <?php print $total; ?></p> -->
			</div>
			<article class="">	
<?php
					echo '<h1> Alertas de estoque </h1>';
					foreach($_SESSION['produtos'] as $produto){
							if($produto['estoque'] > 10 && $produto['estoque'] < 30){
							echo '<p>'.$produto['nome'].' está com estoque abaixo da média!</p>';
						}
						elseif($produto['estoque'] < 10){
							echo '<p>'.$produto['nome'].' está com estoque severamente abaixo da média!</p>';
						}	


						elseif ($produto['estoque'] == '0'){
						echo '<p>'.$produto['nome'].' fora de estoque! </p>';	
						}
					}
				?>
			</article>
		</div>
	</main>
	<footer>
		<!-- Aqui ficará a parte do financeiro -->
		<div>
		<h3>Estoque</h3>
		<p>Estoque de todos os produtos:</p>
		<!-- <p>Valor dos Produtos</p> -->
		</div>

		<div>
		<h3>Investimento <br>(Gasto nos Produtos)</h3>
		<p></p>
		</div>

		<div>
		<h3>Lucro Total</h3>
		<p></p>
		</div>
	</footer>
</body>
