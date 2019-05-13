	<?php
		if (isset($_SESSION['logado'])) { //verifica se a sessão já não estava aberta e destrói a sessão
		session_unset();
		session_destroy();
	}

	if ($_POST['usuario'] == "admin" && $_POST['senha'] == "12345") {
		$_SESSION['logado'] = true;
		$tempo_entrada = time();
		$_SESSION['Cookie_countdown'] = $tempo_entrada;
		include('menu.php');		
	}
	
	
	?>
