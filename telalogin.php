<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>SUPPI LTDA.</title>
</head>

<body id="background">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 mt-5 cpf">
				<form name="form_login" action="index.php" method="post">
					<div class="form-group justify-content-center">
						<label for="usuario">Login:</label>
						<input type="text" name="usuario" class="form-control" placeholder="Login" required="" autofocus="">
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" name="senha" class="form-control" placeholder="Senha" required="">
					</div>
					<div class="botao mb-3">
						<button name="validaLogin" type="submit" class="btn btn-warning ml-6">Enviar</button>
					</div>
				</form>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>