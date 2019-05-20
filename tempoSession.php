<?php
if ( isset( $_SESSION["sessiontime"] ) ) { 
	if ($_SESSION["sessiontime"] < time() ) { 
        session_unset();
        session_destroy();
		echo "Seu tempo Expirou!";
		header("location: logoff.php");
	} else {
		//Seta mais tempo 60 segundos
		$_SESSION["sessiontime"] = time() + '600';
	}
} else { 
	session_unset();
	header("location: index.php");
}