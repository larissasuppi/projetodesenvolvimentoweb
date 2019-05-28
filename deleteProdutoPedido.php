<?php
$exclui_produto = array('id_produto' => $_POST['excProdutoList'], 'id_pedido' => $_POST['excluirPedidoDaLista']);

$exclusao = $pdo->prepare("DELETE FROM tb_pedido_produtos WHERE id_pedido =:id_pedido and id_produto =:id_produto");
$exclusao->execute($exclui_produto);

if ($exclusao->rowCount() > 0) {
    include 'menu.php';
    include 'pedidos.php';
} else {
    echo "<br><br><br>ERRO Excluir!!!!!";
}