<?php
	require_once ("conectaBanco.php");

	 if(isset($_POST['cadastrarCliente'])) {
	 	$novo_cliente = array(
		'nome' => $_POST['nome'], 
		'endereco' => $_POST['endereco'], 
		'numero' => $_POST['numero'], 
		'observacao' => $_POST['observacao'], 
		'cep' => $_POST['cep'], 
		'bairro' => $_POST['bairro'], 
		'cidade' => $_POST['cidade'], 
		'estado' => $_POST['estado'], 
		'telefone' => $_POST['telefone'], 
		'email' => $_POST['email']);

		$stmt = $pdo->prepare("INSERT INTO tb_clientes (nome,endereco,numero,observacao,cep,bairro,cidade,estado,telefone,email) VALUES (:nome,:endereco,:numero,:observacao,:cep,:bairro,:cidade,:estado,:telefone,:email)");
		
		$stmt->execute($novo_cliente);


			if ($stmt->rowCount() > 0) {
			include 'menu.php';
			include 'cadastroCliente.php';

			} else {
			echo "<br><br><br>ERRO novo!!!!!";
			}
	 }
	


    

?>