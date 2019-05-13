<?php
	$exclui_cliente = array('id' => $_POST['idCliente']);
	$stmt = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente = :id");
	$stmt->execute($exclui_cliente);

	if ($stmt->rowCount() > 0) {
		include 'menu.php';
		include 'cadastroCliente.php';
	} else {
	echo "<br><br><br>ERRO Excluir!!!!!";
	}

?>