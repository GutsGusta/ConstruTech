
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">	
	<link rel="stylesheet" href= "style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConstruTech</title>
</head>
<body>
	<header>

	</header>
	<main>
		<form>
			<h1> Cadastro de produto </h1>
			<label for="nome"> Nome </label>
			<br>
			<input type="text" maxlength="200" id="nome" name="nome">
			<label for="preco"> Preço </label>
			<br>
			<input type="number" maxlength="20" id="preco" name="preco" min="0">
			<label for="estoque"> Estoque </label>
			<br>
			<input type="number" id="estoque" name="estoque" maxlength="20" min="0">
			<label for="categoria"> Categoria </label>
			<br>
			<input type="text" id="categoria" name="categoria" maxlength="200">
			<button type="submit"> Enviar </button>				
		</form>
	</main>
</body>
