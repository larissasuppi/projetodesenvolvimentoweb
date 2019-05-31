<?php

$editaProdutoDaListaDePedido = array(
    'quantidade' => $_POST['recebeNovaQuantidade'],
    'valor' => $_POST['recebeNovoValor'],
    'id_pedido' => $_POST['id_pedidoEdicao'],
    'id_produto' => $_POST['id_produtoEdicao'],
    'observacao' => $_POST['recebeNovaObservacao']);

$updp = $pdo->prepare("UPDATE tb_pedido_produtos SET quantidade = :quantidade,valor = :valor,observacao =:observacao WHERE id_pedido =:id_pedido and id_produto =:id_produto");
$updp->execute($editaProdutoDaListaDePedido);

if ($updp->rowCount() > 0) {
    include './menu.php';
    include './pedidos.php';
} else {
    echo "Deu erro, tente de novo!";
}
