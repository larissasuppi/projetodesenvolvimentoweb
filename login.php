	<?php
	if (isset($_SESSION['logado'])) { //verifica se a sessão já não estava aberta e destrói a sessão

		$_SESSION = array();
		session_unset();
		

	}
	if ($_POST['usuario'] == 'admin' && $_POST['senha'] == '12345') {
		$_SESSION['logado'] = true;
		$_SESSION['dataLogin'] = time();
		include('menu.php');
	}else{
		include('logoff.php');
	}

	
	if( isset( $_SESSION['views'] ) ) {

		$_SESSION['views']++;

	}else{

		$_SESSION['views']=1;

	}

	echo "Visualizações=".$_SESSION['views'];

	?>
