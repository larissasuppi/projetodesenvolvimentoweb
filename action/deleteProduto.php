<?php
	$exclui_produto = array('id' => $_POST['idProduto']);
	$stmt = $pdo->prepare("DELETE FROM tb_produtos WHERE id_produto = :id");
	$stmt->execute($exclui_produto);

	if ($stmt->rowCount() > 0) {
		include 'menu.php';
		include './tabelaProdutos.php';
	} else {
	echo "<br><br><br>ERRO Excluir!!!!!";
	}

?>