<?php include 'conectaBanco.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="select/css/tail.select-bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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


  if (isset($_POST['clientes'])) {
    include('menu.php');
    include('cadastroCliente.php');
  } elseif (isset($_POST['produtos'])) {
    include('menu.php');
    include('tabelaProdutos.php');
  } elseif (isset($_POST['pedidos'])) {
    include('menu.php');
    include('pedidosInicial.php');
  } elseif (isset($_POST['validaLogin'])) {
    include('login.php');
  } elseif (isset($_POST['adicionar'])  || isset($_POST['editaCliente'])) {
    include('menu.php');
    include('clientes.php');
  } elseif (isset($_POST['adicionarPedido'])) {
    include('menu.php');
    include('pedidos.php');
  } elseif (isset($_POST['adicionarProduto']) || isset($_POST['editaProduto'])) {
    include('menu.php');
    include('produtos.php');
  } elseif (isset($_POST['cadastrarCliente'])) {
    include('action/insertCliente.php');
  } elseif (isset($_POST['deletaCliente'])) {
    include('action/deleteCliente.php');
  } else if (isset($_POST['editarCliente'])) {
    include('action/editarCliente.php');
  } else if (isset($_POST['cadastrarProduto'])) {
    include('action/insertProduto.php');
  } elseif (isset($_POST['deletaProduto'])) {
    include('action/deleteProduto.php');
  } elseif (isset($_POST['editarProduto'])) {
    include('action/editarProduto.php');
  } elseif (isset($_POST['inserirClienteParaFazerPedido'])) {
    include('action/insertPedido.php');
  } elseif (isset($_POST['adicionaProdutoNoPedido'])) {
    include('menu.php');
    include('pedidos.php');
  } elseif (isset($_POST['AddProdutoNaListaDePedido'])) {
    include('action/insertProdutoPedido.php');
  } elseif (isset($_POST['FinalizarPedido'])) {
    include('menu.php');
    include('pedidosInicial.php');
  } elseif (isset($_POST['editarProdutoDaLista'])) {
    include('menu.php');
    include('editarProdutoPedido.php');
  } elseif (isset($_POST['editarProdutoNoPedido'])) {
    include('action/atualizarProdutoPedido.php');
  } elseif (isset($_POST['excluirProdutoDaLista'])) {
    include('action/deleteProdutoPedido.php');
  } elseif (isset($_POST['buttonExcluirPedidoFinal'])) {
    include('action/deletePedidoFinal.php');
  } elseif (isset($_POST['enviaDadosPdf'])) {
    $_SESSION['id_pedido'] = $_POST['gerarPdf'];
    $_SESSION['id_cliente'] = $_POST['nomeClientePdf'];
    header("location: gerarPdf.php");
  } elseif (isset($_POST['validaLogin'])) {
    include('login.php');
  } else {
    include('telalogin.php');
  }




  $tempo_atual = time();
  $tempo_permitido = 1800; // tempo em segundos até redirecionar
  $fim = -1;

  if (isset($_SESSION['Cookie_countdown'])) {
    $tempo_gravado = $_SESSION['Cookie_countdown'];
    $tempo_gerado = $tempo_atual - $tempo_gravado;
    $fim = $tempo_permitido - $tempo_gerado;
    if ($fim <= 0) {
      echo "tempo esgotado";
      $_SESSION['Cookie_countdown'] = "";
    } else {
      $_SESSION['Cookie_countdown'] = time(); // tempo começa a contar novamente
      $tempo_gravado = $_SESSION['Cookie_countdown'];
      $tempo_gerado = $tempo_atual - $tempo_gravado;
      $fim = $tempo_permitido - $tempo_gerado;
    }
  }
  ?>


  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <!-- JS para campos pedidos -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js/janelaModal.js"></script>

  <script src="https://yandex.st/highlightjs/7.3/highlight.min.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-*.min.js"></script>

  <script src="js/jquery.mask.min.js"></script>
  <!-- JQuery formatação campos -->
  <!-- <script src="js/examples.js"></script> -->
  <script src="select/js/tail.select-full.min.js"></script>
  <script>
      tail.select('#select1', {
        search : true,
        animate: true,
        placeholder: "Selecione um cliente...",
        
      })
     
  </script>

  <script>
    var contador = '<?php if ($fim <= 0) {
                      echo $tempo_permitido + 1;
                    } else {
                      echo "$fim";
                    } ?>';

    function Conta() {
      if (contador <= 0) {
        location.href = 'telalogin.php';
        return false;
      }
      contador = contador - 1;
      setTimeout("Conta()", 1000);
      var minutos = Math.floor(contador / 60);
      var segundos = contador - minutos * 60;

      document.getElementById("valor").innerHTML = "A sessão irá expirar em: " + minutos + ":" + segundos;
    }
    window.onload = function() {
      Conta();
    }
  </script>


</body>

</html>