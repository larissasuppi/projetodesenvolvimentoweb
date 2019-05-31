<?php
$verificaProduto = array(
    'id_pedido' => $_POST['idPedido'],
    'id_produto' => $_POST['idProduto']);

$pop = $pdo->prepare("SELECT * FROM tb_pedido_produtos WHERE id_pedido = :id_pedido AND id_produto = :id_produto");
$pop->execute($verificaProduto);
$dadosPedido = $pop->fetch();

if ($dadosPedido) {
    $editaProdutoDaListaDePedido = array(
        'novaQuantidade' => $dadosPedido['quantidade'] + $_POST['quantidadeProdutos'],
        'id_pedido' => $_POST['idPedido'],
        'id_produto' => $_POST['idProduto']);

    $updp = $pdo->prepare("UPDATE tb_pedido_produtos SET quantidade = :novaQuantidade WHERE id_pedido =:id_pedido and id_produto =:id_produto");
    $updp->execute($editaProdutoDaListaDePedido);

    include './menu.php';
    include './pedidos.php';
} else {
    $produtinho = array(
        'id_pedido' => $_POST['idPedido'],
        'id_produto' => $_POST['idProduto'],
        'quantidade' => $_POST['quantidadeProdutos'],
        'valor' => $_POST['valor'],
        'obsevacao' => $_POST['observacaoProdutos']);
    $insert = $pdo->prepare("INSERT INTO tb_pedido_produtos (id_pedido,id_produto,quantidade,valor,observacao) VALUES (:id_pedido, :id_produto,:quantidade,:valor,:obsevacao)");
    $insert->execute($produtinho);

    if ($insert->rowCount() > 0) {
        include './menu.php';
        include './pedidos.php';
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
    }
}

?>