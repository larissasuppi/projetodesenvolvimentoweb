<?php

$db = mysqli_connect('localhost','root','12345','db_abc_bolinhas');

function retornaCliente($cliente,$db) {
    $result_codigo = "select * from tb_clientes where id_cliente = '$cliente' LIMIT 1";
    $resultado_Cliente = mysqli_query($db, $result_codigo);
    if($resultado_Cliente->num_rows){
        $row_cliente = mysqli_fetch_assoc($resultado_Cliente);
        $valores['endereco'] = $row_cliente['endereco'];
        $valores['numero'] = $row_cliente['numero'];
        $valores['telefone'] = $row_cliente['telefone'];
        $valores['id_cliente'] = $row_cliente['id_cliente'];
        $valores['cep'] = $row_cliente['cep'];
        $valores['bairro'] = $row_cliente['bairro'];
        $valores['cidade'] = $row_cliente['cidade'];
        $valores['observacao'] = $row_cliente['observacao'];
    }else {
        $valores['endereco'] = 'Endereco não encontrado';
    }
    return json_encode($valores);
}
if(isset($_GET['cliente'])) {
    echo retornaCliente($_GET['cliente'],$db);
}



function retornaProdutos($produtos,$db) {
    $result_codigo = "select * from tb_produtos where id_produto = '$produtos' LIMIT 1";
    $resultado_Cliente = mysqli_query($db, $result_codigo);
    if($resultado_Cliente->num_rows){
        $row_cliente = mysqli_fetch_assoc($resultado_Cliente);
        $valores['codigoProduto'] = $row_cliente['id_produto'];
        $valores['preco'] = $row_cliente['valor'];
    }else {
        $valores['endereco'] = 'Endereco não encontrado';
    }
    return json_encode($valores);
}
if(isset($_GET['produtos'])) {
    echo retornaProdutos($_GET['produtos'],$db);
}

?>