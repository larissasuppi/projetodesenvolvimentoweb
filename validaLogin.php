<?php
/*verifica se não esta logado*/
if (session_status() == PHP_SESSION_NONE && !isset($_SESSION['logado'])) {
	require './logoff.php';
}
