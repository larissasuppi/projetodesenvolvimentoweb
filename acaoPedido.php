<?php  include 'conectaBanco.php';

if(isset($_POST['adicionarPedido'])) {
    $novo_pedido = array(
    ':dataAtual' => date("Y-m-d H:i:s"),
    ':idCliente' => $_POST['codigoCliente'], 
    ':observacao' => $_POST['obs']
);
    
    $stmt = $pdo->prepare("INSERT INTO tb_pedidos (data_hora,id_cliente,observacao)
    VALUES (:dataAtual,:idCliente,:observacao)");
    $stmt->execute($novo_pedido);
    $idPedido = $pdo->lastInsertId();
    
    $pedido_produtos = array(
        ':id_pedido' => $idPedido,
        ':id_produto' => $_POST['produtos'], 
        ':quantidade' => $_POST['quantidade'],
        ':valortotal' => $_POST['total'],
        ':observacao' => $_POST['obsProduto']
    );
    $stmt1 = $pdo->prepare("INSERT INTO tb_pedido_produtos (id_pedido,id_produto,quantidade,valor,observacao)
    VALUES (:id_pedido,:id_produto,:quantidade,:valortotal,:observacao)");
    $stmt1->execute($pedido_produtos);

    if ($stmt1->rowCount() > 0) {
    include('menu.php');
    
    } else {
    echo "<br><br><br>ERRO novo!!!!!";
    }
}
if(isset($_POST['deletaPedido'])) {
    $exclui_pedido = array(':id' => $_POST['idPedido']);
        $stmt = $pdo->prepare("DELETE FROM tb_pedido_produtos WHERE id_pedido = :id; DELETE FROM tb_pedidos WHERE id_pedido = :id");
        $stmt->execute($exclui_pedido);
        
        if ($stmt->rowCount() > 0) {
            include('menu.php');
            
        } else {
        echo "<br><br><br>ERRO Excluir!!!!!";
        }
    
}

?>