<?php

	
$encoded_image = "data:" . $_FILES['imagem']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));
 $edit_produto = array('id' => $_POST['idProduto'], 'descricao' => $_POST['descricao'], 'valor' => $_POST['valor'], 'imagem' => $encoded_image);
$stmt = $pdo->prepare("UPDATE tb_produtos SET descricao = :descricao,valor = :valor,imagem = :imagem WHERE id_produto = :id");
$stmt->execute($edit_produto);

if ($stmt->rowCount() > 0) {
		include 'menu.php';
		include 'tabelaProdutos.php';
} else {
echo "<br><br><br>ERRO Editar!!!!!";
	echo $_POST['idProduto'];
}




?>