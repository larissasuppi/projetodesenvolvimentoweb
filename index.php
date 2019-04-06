<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Index</title>
  </head>
  <body>


    <div class="container">
      <div class="row" id="contador">
        <div id="valor"></div>
      </div>
    </div>

        
  <?php

    session_cache_expire(30);
    session_start();

    
    if(isset($_POST['clientes'])){
      include('menu.php');
      include('cadastroCliente.php');

    }elseif(isset($_POST['produtos'])){
      include('menu.php');
      include ('produtos.php');

    }elseif(isset($_POST['pedidos'])){
      include('menu.php');
      include ('pedidos.php');

    }elseif(isset($_POST['validaLogin'])){
      include ('login.php');

    }elseif (isset($_POST['adicionar'])) {
      include ('menu.php');
      include('clientes.php');

    }elseif (isset($_POST['adicionarPedido'])) {
      include ('menu.php');
      include('pedidos.php');

    }elseif (isset($_POST['adicionarProduto'])) {
      include ('menu.php');
      include('produtos.php');

    }//elseif(isset($_POST['cadastrarCliente']){
      //include ('menu.php');
      //include ('cadastroCliente.php');
    //}
    else{
      include('telalogin.php');
    }
  ?>

   
    

  <?php
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
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

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

    document.getElementById("valor").innerHTML = minutos + ":" + segundos;
    }
    window.onload = function() {
    Conta();
    }
  </script>

    
</body>
</html>