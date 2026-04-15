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
				</tr>
<?php
	$retorno = array_column($_SESSION['produtos'], 'preço') * array_column($_SESSION['produtos'], 'estoque') - array_column($_SESSION['produtos'], 'investimento'];
				foreach($_SESSION['produtos'] as $produto){
					echo '<td>'.$produto['nome'].'</td>
						<td>'.$produto['preço'].'</td>
						<td>'.$produto['categoria'].'</td>
						<td>'.$produto['estoque'].'</td>
						<td>'.$produto['investimento'].'</td>
						<td>'.$retorno.'</td>'
				};
				?>
			<article class="">	
		</article>
		</div>
	</main>
</body>
