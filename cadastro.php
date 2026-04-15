<?php
require_once 'init.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = htmlspecialchars(trim($_POST['nome']));
		$preco = htmlspecialchars(trim($_POST['preco']));
		$investimento = htmlspecialchars(trim($_POST['investimento']));
		$estoque = htmlspecialchars(trim($_POST['estoque']));
		$categoria = htmlspecialchars(trim($_POST['categoria']));
		$imagem = htmlspecialchars(trim($_POST['imagem']));

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
		header('Location: index.php?produtoadd=1');
		exit();
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
			<form action="cadastro.php" method="POST" class="formulario">
				<label for="nome">Nome</label>
				<input type="text" maxlength="200" id="nome" name="nome" class="campo-form" required>
				<label for="preco">Preço(R$)</label>
				<input type="text" maxlength="20" id="preco" name="preco" class="campo-form" required>
				<label for="investimento">Investimento(R$)</label>
				<input type="text" maxlength="20" id="investimento" name="investimento" class="campo-form" required>
				<label for="estoque">Estoque (Quantidade)</label>
				<input type="text" id="estoque" name="estoque" maxlength="20" class="campo-form" required>
				<label for="imagem">Imagem (Link)</label>
				<input type="twxt" id="imagem" name="imagem" class="campo-form" required>
				<label for="categoria">Categoria</label>	
				<select name=categoria id=categoria required>
					<option value="bruto">Bruto</option>
					<option value="ferramenta">Ferramenta</option>
					<option value="acabamento">Acabamento</option>	
				</select>
				<button type="submit" class="botao-enviar">Enviar</button>				
			</form>
		</div>
	</main> 
</body>
