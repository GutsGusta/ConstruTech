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
			<td>'.$produto['preco'].'</td>
			<td>'.$produto['categoria'].'</td>
			<td>'.$produto['estoque'].'</td>
			<td>'.$produto['investimento'].'</td>
			<td>'.$totalLinha.'</td>
			<td>'.$produto['id'].'</td>
	</tr>';
						$total +=$totalLinha;
				}
				?>
			<article class="">	
				total do estoque <?php print $total; ?>
		</article>
		</div>
	</main>
</body>
