<?php
$exclui_pedido = array('id_pedido' => $_POST['excluirPedidoFinal']);

$exclusao = $pdo->prepare("DELETE FROM tb_pedidos WHERE id_pedido =:id_pedido");
$exclusao->execute($exclui_pedido);

if ($exclusao->rowCount() > 0) {
    include 'menu.php';
    include 'pedidosInicial.php';
} else {
    echo "Produto já foi excluído";
}