<?php
$novo_cliente_pedido = array(
    'id_cliente' => $_POST['buscarClientePedido'],
    'observacao' => $_POST['observacaoClientePedido']);

$insert = $pdo->prepare("INSERT INTO tb_pedidos (data_hora,id_cliente,observacao) VALUES (NOW(), :id_cliente,:observacao)");
$insert->execute($novo_cliente_pedido);
unset($_POST['cadastrarClienteParaFazerPedido']);


if ($insert->rowCount() > 0) {
    include 'menu.php';
    include 'pedidos.php';
} else {
    echo "<br><br><br>ERRO novo!!!!!";
}


?>