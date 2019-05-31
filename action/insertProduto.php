<?php
	require_once ("conectaBanco.php");

	
	 if(isset($_POST['cadastrarProduto'])) {
		$encoded_image = "data:" . $_FILES['imagem']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));
	 	$novo_produto = array(
		'descricao' => $_POST['descricao'], 
		'valor' => $_POST['valor'], 
		'imagem' => $encoded_image);

		$stmt = $pdo->prepare("INSERT INTO tb_produtos (descricao,valor,imagem) VALUES (:descricao,:valor,:imagem)");
		
		$stmt->execute($novo_produto);


			if ($stmt->rowCount() > 0) {
			include 'menu.php';
			include './tabelaProdutos.php';

			} else {
			echo "<br><br><br>ERRO novo!!!!!";
			}
	 }
	

?>