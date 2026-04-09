
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
			<input type="text" maxlength="200" id="nome" name="nome"><br>
			<label for="preco"> Preço </label>
			<br>
			<input type="number" maxlength="20" id="preco" name="preco" min="0"><br>
			<label for="estoque"> Estoque </label>
			<br>
			<input type="number" id="estoque" name="estoque" maxlength="20" min="0"><br>
			<label for="categoria"> Categoria </label>
			<br>
			<select name=categoria id=categoria>
				<option value="bruto">Bruto</option>
				<option value="ferramenta">Ferramenta</option>
				<option value="acabamento">Acabamento</option>	
			</select><br><br>
			<button type="submit">Enviar</button>				
		</form>
	</main> 
</body>
