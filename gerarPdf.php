<?php

include 'conectaBanco.php';
session_start();

include 'validaLogin.php';

use Dompdf\Dompdf;

if (!isset($_SESSION['id_pedido'])) {
    require 'logoff.php';
} else {
    $AddprodutosNaLista = array('id_pedido' => $_SESSION['id_pedido']);
    $ltopc = $pdo->prepare("SELECT tb_pedido_produtos.id_produto, tb_pedido_produtos.quantidade, tb_pedido_produtos.valor, tb_produtos.descricao FROM tb_pedido_produtos LEFT JOIN tb_produtos ON tb_produtos.id_produto=tb_pedido_produtos.id_produto WHERE tb_pedido_produtos.id_pedido = :id_pedido");
    $ltopc->execute($AddprodutosNaLista);
    $listaTodosPedidosCadastrados = $ltopc->fetchAll(PDO::FETCH_OBJ);

    $dataPedido = $pdo->prepare("SELECT * FROM tb_pedidos where id_pedido = :id_pedido");
    $dataPedido->execute($AddprodutosNaLista);
    $listarData = $dataPedido->fetch();

    $AddDadosClienteNaLista = array('id_cliente' => $_SESSION['id_cliente']);
    $rs = $pdo->prepare("SELECT * FROM tb_clientes where id_cliente = :id_cliente");
    $rs->execute($AddDadosClienteNaLista);
    $listarClientes = $rs->fetch();

    $impressaoNumeroPedido = $_SESSION['id_pedido'];


    $html = '<h1 class="text-center"><center>Suppi LTDA</center></h1>
        <div class="col-sm-12" style="background-color:black;"></div>
        <h2><center>Pedido: ' . $_SESSION['id_pedido'] . '</center></h2>

        <div class="row">
            <div class="col-md-3 pull-right">
                <h3>Data: ' . $listarData['data_hora'] . ' </h3>
            </div>
        </div>
        <div class="col-sm-12" style="background-color:black;"></div>
        <div class="row">
            <div class="col-sm-4">
                <h3>Dados Fornecedor</h3>
                <label>Empresa: Suppi LTDA</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>CNPJ: 22.486.557/0001-175</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Estado: SC</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Cidade: Anita Garibaldi</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Bairro: Centro</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Rua: Rua Benjamim Suppi</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Numero: 981</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Telefone: 49988216106</label>
            </div>
        </div>
        <br>
        <div class="col-sm-12" style="background-color:black;"></div>
        <div class="row">
            <div class="col-sm-4">
                <h3>Dados Cliente</h3>
                <label>Empresa: ' . $listarClientes['nome'] . ' </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                <label>CEP: ' . $listarClientes['cep'] . ' </label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Estado: ' . $listarClientes['estado'] . ' </label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Cidade: ' . $listarClientes['cidade'] . ' </label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Bairro: ' . $listarClientes['bairro'] . ' </label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Rua: ' . $listarClientes['endereco'] . ' </label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Numero: ' . $listarClientes['numero'] . '</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label>Telefone:' . $listarClientes['telefone'] . ' </label>
            </div>
        </div>
        <br>
        <div class="col-sm-12" style="background-color:black;"></div>
        <div class="row">
            <div class="col-sm-4">
                <h3>Produtos</h3>

            </div>
        </div>
        <table width="100%">
            <thead>
            <tr>
            <th>Cod</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor Unitario</th>
            <th>Subtotal</th>
            </tr>
        </thead>
        <tbody> ';
    foreach ($listaTodosPedidosCadastrados as $l) :
        $html .= '
                <tr>
                    <td>' . $l->id_produto . ' </td>
                    <td>' . $l->descricao . '</td>
                    <td>' . $l->quantidade . '</td>
                    <td>' . $l->valor . '</td>
                    <td>' . $l->quantidade * $l->valor . '</td>             
                </tr>';

    endforeach;
    $html .= '
        </tbody> 
    </table>
';

    require_once('dompdf/autoload.inc.php');

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'portrait');
    $dompdf->render();

    $dompdf->stream("Pedido_$impressaoNumeroPedido", array("Attachment" => true));
}
