<?php

	

$edit_cliente = array('id' => $_POST['idCliente'], 'nome' => $_POST['nome'], 'endereco' => $_POST['endereco'], 'numero' => $_POST['numero'], 'observacao' => $_POST['observacao'], 'cep' => $_POST['cep'], 'bairro' => $_POST['bairro'], 'cidade' => $_POST['cidade'], 'estado' => $_POST['estado'], 'telefone' => $_POST['telefone'], 'email' => $_POST['email']);
$stmt = $pdo->prepare("UPDATE tb_clientes SET nome = :nome,endereco = :endereco,numero = :numero,observacao = :observacao,cep = :cep,bairro = :bairro,cidade = :cidade,estado = :estado,telefone = :telefone,email = :email WHERE id_cliente = :id");
$stmt->execute($edit_cliente);

if ($stmt->rowCount() > 0) {
		include 'menu.php';
		include 'cadastroCliente.php';
} else {
echo "<br><br><br>ERRO Editar!!!!!";
}




?>