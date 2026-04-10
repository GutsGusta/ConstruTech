<?php
foreach($_SESSION['produtos'] as $produto){
	echo '<tr>
			<td>'.$produto['id'].'</td>
			<td>'.$produto['nome'].'</td>
			<td>'.$produto['categoria'].'</td>
			<td>'.$produto['preco'].'</td>
			<td>'.$produto['estoque'].'</td>
			<td>'.$produto['investimento']'</td>';
}
?>
