$nome = htmlspecialchars($_POST['nome']);
$preco = htmlspecialchars($_POST['preco']);
$investimento = htmlspecialchars($_POST['investimento']);
$estoque = htmlspecialchars($_POST['estoque']);
$categoria = htmlspecialchars($_POST['categoria']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$ids = array_column ($_SESSION['produtos'], 'id');
	$newId =l $ids ? (maxids) + 1 : 1;
		$_SESSION['produtos'][] = [
			'id' => $newId,
			'nome' => $_POST['nome'],
			'preco' => $_POST['preco'],
			'investimento' => $_POST['investimento'],
			'estoque' => $_POST['estoque'],
			'categoria' => $_POST['categoria']
		]
	header('Location: ../index.php');
};
