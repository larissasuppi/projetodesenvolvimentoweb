<?php include 'conectaBanco.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Index</title>
  </head>
  <body>

<div class="jumbotrom jumbotron-fluid py-3 bg-warning">
  <div class="container">
      <div class="row">
        <div id="valor"></div>
      </div>
    </div>
</div>
    

        
  <?php

    session_cache_expire(30);
    session_start();
    require 'validaLogin.php';

    
    if(isset($_POST['clientes'])){
      include('menu.php');
      include('cadastroCliente.php');

    }elseif(isset($_POST['produtos'])){
      include('menu.php');
      include ('tabelaProdutos.php');

    }elseif(isset($_POST['pedidos'])){
      include('menu.php');
      include ('pedidos.php');

    }elseif(isset($_POST['validaLogin'])){
      include ('login.php');

    }elseif (isset($_POST['adicionar'])  || isset($_POST['editaCliente'])  ) {
      include ('menu.php');
      include('clientes.php');

    }elseif (isset($_POST['adicionarPedido'])) {
      include ('menu.php');
      include('pedidos.php');

    }elseif (isset($_POST['adicionarProduto']) || isset($_POST['editaProduto'])) {
      include ('menu.php');
      include('produtos.php');

    }elseif(isset($_POST['cadastrarCliente' ])){
       include ('insertCliente.php');

    }elseif(isset($_POST['deletaCliente'])){
       include ('deleteCliente.php');

    }else if (isset($_POST['editarCliente'])) {
      include('editarCliente.php');

    }else if (isset($_POST['cadastrarProduto'])) {
      include('insertProduto.php');

    }elseif(isset($_POST['deletaProduto'])){
      include ('deleteProduto.php');

   }elseif(isset($_POST['editarProduto'])){
    include ('editarProduto.php');

 }
    else{
      include('telalogin.php');
    }
  



  $tempo_atual = time();
  $tempo_permitido = 1800; // tempo em segundos até redirecionar
  $fim = -1;
  
  if(isset($_SESSION['Cookie_countdown'])) {
    $tempo_gravado = $_SESSION['Cookie_countdown'];
    $tempo_gerado = $tempo_atual-$tempo_gravado;
    $fim = $tempo_permitido - $tempo_gerado;
    if($fim <= 0) {
      echo "tempo esgotado";
      $_SESSION['Cookie_countdown'] = "";
    } else {
      $_SESSION['Cookie_countdown'] = time(); // tempo começa a contar novamente
      $tempo_gravado = $_SESSION['Cookie_countdown'];
      $tempo_gerado = $tempo_atual-$tempo_gravado;
      $fim = $tempo_permitido - $tempo_gerado;
    }
  }
?>


  <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="js/examples.js"></script>

<script language="JavaScript">
    var contador = '<?php if($fim <= 0) { echo $tempo_permitido+1; } else { echo "$fim"; } ?>';
    function Conta() {
    if(contador <= 0) {
    location.href='telalogin.php';
    return false;
    }
    contador = contador-1;
    setTimeout("Conta()", 1000);
    var minutos = Math.floor(contador / 60);
    var segundos = contador - minutos * 60;

    document.getElementById("valor").innerHTML ="A sessão irá expirar em: " + minutos + ":" + segundos;
    }
    window.onload = function() {
    Conta();
    }
  </script>

    
</body>
</html>