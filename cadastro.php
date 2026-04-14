<?php
	$nome = htmlspecialchars(($_POST['nome']));
	$preco = htmlspecialchars($_POST['preco']);
	$investimento = htmlspecialchars($_POST['investimento']);
	$estoque = htmlspecialchars($_POST['estoque']);
	$categoria = htmlspecialchars($_POST['categoria']);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$ids = array_column ($_SESSION['produtos'], 'id');
		$newId = $ids ? max($ids) + 1 : 1;
			$_SESSION['produtos'][] = [
				'id' => $newId,
				'nome' => $_POST['nome'],
				'preco' => $_POST['preco'],
				'investimento' => $_POST['investimento'],
				'estoque' => $_POST['estoque'],
				'categoria' => $_POST['categoria']
			];		
	}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">	
	<link rel="stylesheet" href= "css/cadastro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Produtos - ConstruTech</title>
</head>
<body>
	<?php
		require_once 'partials/header.php';
	?>
	<main>
		<div class="main-form">
			<h1>Cadastro de produto</h1>
			<form action="index.php" method="POST" class="formulario">
				
				<label for="nome">Nome</label>
				<br>
				<input type="text" maxlength="200" id="nome" name="nome" required><br>
				<label for="preco">Preço</label>
				<br>
				<input type="number" maxlength="20" id="preco" name="preco" min="0" required><br>
				<label for="investimento">Investimento</label>
				<br>
				<input type="number" maxlength="20" id="investimento" name="investimento" min="0" required><br>
				<label for="estoque">Estoque</label>
				<br>
				<input type="number" id="estoque" name="estoque" maxlength="20" min="0" required><br>
				<label for="categoria">Categoria</label>
				<br>
				<select name=categoria id=categoria required>
					<option value="bruto">Bruto</option>
					<option value="ferramenta">Ferramenta</option>
					<option value="acabamento">Acabamento</option>	
				</select><br><br>
				<button type="submit" class="botao-enviar">Enviar</button>				
			</form>
		</div>
	</main> 
</body>
