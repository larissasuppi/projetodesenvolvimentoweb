<?php
include './validaSessao.php';

$preencheFormPedido = array('id_pedido' => $_POST['recebeIdLegal'], 'id_produto' => $_POST['editarProdutoDaLista']);
$popleB = $pdo->prepare("SELECT tb_pedido_produtos.id_produto, tb_produtos.descricao, tb_pedido_produtos.valor, tb_pedido_produtos.quantidade, tb_pedido_produtos.observacao FROM tb_pedido_produtos
INNER JOIN tb_produtos ON tb_produtos.id_produto=tb_pedido_produtos.id_produto WHERE tb_pedido_produtos.id_pedido = :id_pedido AND tb_pedido_produtos.id_produto = :id_produto");
$popleB->execute($preencheFormPedido);
$populaOsProdutos = $popleB->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
    <form action="index.php" method="POST">
        <div class="row col-md-12">
            <table class="table">
                <thead>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observacao</th>

                </thead>
                <tbody>
                    <?php foreach ($populaOsProdutos as $l) : ?>
                        <tr>
                            <td width="20px"><?php echo $l->id_produto; ?></td>
                            <td width="70%"><?php echo $l->descricao; ?></td>
                            <td width="5%"><input type="text" name="recebeNovoValor" value="<?php echo $l->valor; ?>"></td>
                            <td width="5%"><input type="text" name="recebeNovaQuantidade" value="<?php echo $l->quantidade; ?>"></td>
                            <td width="10%"><input type="text" name="recebeNovaObservacao" value="<?php echo $l->observacao; ?>"></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <input type="hidden" name="id_pedidoEdicao" value="<?php echo $_POST['recebeIdLegal'] ?>">
            <input type="hidden" name="id_produtoEdicao" value="<?php echo $_POST['editarProdutoDaLista'] ?>">
            <button name="editarProdutoNoPedido" class="btn btn-success" value="salvarAlteracaoProdutoNoPedido" type="submit">Salvar</button>
        </div>
    </form>
</div>
<div class="jumbotron jumbotron-fluid py-3">
    <footer class="footer-copyright text-center py-3">
        @ 2019 Larissa Pinheiro Suppi
    </footer>
</div>