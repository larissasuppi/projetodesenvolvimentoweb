<?php require 'validaLogin.php';

$db = mysqli_connect('localhost','root','12345','db_abc_bolinhas');

date_default_timezone_set('America/Sao_Paulo');
?>

<div class="container">
  <div class="row formulario">
    <div class="col-md-12">
      <div class="display-3">Pedidos</div>
    </div> 
  </div>
  <div class="row cadastro">
    <div class="col-md-12">
      <form class="form-group needs-validation justify-content-center" action="acaoPedido.php" method="post" novalidate>
        <div class="form-row">
          <div class="form-group col-md-1">
            <label for="inputPedido">Pedido: </label>
            <input type="number" class="form-control" id="inputPedido" readonly placeholder="Número" required="">
          </div>  
          <div class="form-group col-md-7">
            <label for="cliente">Nome do Cliente:</label>
            <select id="cliente" name="cliente" class="form-control">
            <option value="">Selecione um cliente...</option>          

              <?php 
  $rs = $pdo->prepare("SELECT * from tb_clientes");
  if ($rs->execute()) {
    if ($rs->rowCount() > 0) {
      while ($row = $rs->fetch(PDO::FETCH_OBJ)) { ?>
      		<option value="<?php echo $row->id_cliente;?>"><?php echo $row->nome;?></option>
      		<?php
      		}
      	}
      }
      		  ?>
            </select>
  
          </div>
          <div class="form-group col-md-2">
            <label for="codeClient">Código do Cliente:</label>
            <input type="text" class="form-control" readonly id="codigoCliente" name='codigoCliente' required>
          </div>
          <div class="form-group col-md-2 ">
            <label for="telefone">Telefone: </label><br>
            <input type="text" class="form-control" readonly maxlength="12" id="telefone" name="telefone" placeholder="(__)_____-____" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputAddress">Endereço: </label>
            <input type="text" class="form-control" id="endereco" name="endereco" readonly required="">
          </div>
          <div class="form-group col-md-1">
            <label for="numero">Número: </label>
            <input type="text" class="form-control" id="numero" name="numero" readonly>
          </div>
          <div class="form-group col-md-2">
            <label for="cep">CEP: </label>
            <input type="text" class="form-control" name="cep" readonly id="cep">
          </div>
          <div class="form-group col-md-2">
            <label for="bairro">Bairro: </label>
            <input type="text" class="form-control" name="bairro" readonly id="bairro">
          </div>
          <div class="form-group col-md-3">
            <label for="cidade">Cidade: </label>
            <input type="text" class="form-control" name="cidade" readonly id="cidade">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-9">
            <label for="obs">Obs.: </label>
            <input type="text" class="form-control" id="obs" readonly placeholder="Digite aqui sua observação do endereço" name="obs" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputData">Data/Hora Local: </label>
            <input type="datetime-local" class="form-control" id="inputData" name="data" value="<?php echo date('Y-m-d\TH:i'); ?>" required readonly>
          </div>
        </div>
        <hr>

        <div id="origem" class="form-row">
        <div class="form-group col-md-3">
            <label for="produtos">Descrição: </label>
            <select id="produtos" name="produtos" class="form-control" required>
            <option value="">Selecione um Produto...</option>                  
              <?php 
                $query = "SELECT * FROM tb_produtos";
                $result = mysqli_query($db, $query);
                  while ($row = mysqli_fetch_object($result)) { ?>
                    <option value="<?php echo $row->id_produto; ?>"><?php echo $row->descricao; ?></option>                  
                <?php }?>
            </select>
          </div>
        
              <div class="form-group col-md-1">
                <label for="codigoProduto">Produto: </label>
                <input type="text" class="form-control" id="codigoProduto" placeholder="Código" readonly name="codigoProduto[]" required>
              </div>
              <div class="form-group col-md-4">
                <label for="ObsProduto">Obs.: </label>
                <input type="text" class="form-control" id="ObsProduto" name="obsProduto" required>
              </div>
              <div class="form-group col-md-1">
                <label for="preco">Preço R$: </label>
                <input type="text" class="form-control" id="preco" placeholder="R$: " readonly name="preco" required>
              </div>
              <div class="form-group col-md-1">
                <label for="quantidade">Quant: </label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required="required" onChange="calculaPreco()">
              </div>
              <div class="form-group col-md-1">
                <label for="total">Total R$: </label>
                <input type="text" class="form-control" id="total" readonly name="total" required>
              </div>
              <div class="form-group col-md-1">
                <label for="total">. </label>
                <button type="button" class="form-control" id="total" name="total" onclick="removerCampos(this);">X</button>
              </div>
        
        </div>
        <div id="destino">
        
        </div>
        <div id="botao">
          <button type="button" onclick="duplicarCampos();" class="btn btn-primary mb-2" id="botao" name="adicionarProdutos">Adicionar Produtos</button>
          <button type="submit" class="btn btn-success mb-2" id="botao" name="adicionarPedido">Concluir Pedido</button>
        </div>
        <hr>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nº Pedido</th>
            <th scope="col">Comprador</th>
            <th scope="col">Produto</th>
            <th scope="col">Preço</th>
            <th scope="col">Qtd</th>
            <th scope="col">Total R$</th>
            <th scope="col">Observaçoes:</th>
            <th scope="col">Relatorio</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $rs = $pdo->prepare("SELECT a.id_pedido,d.nome,c.descricao,c.valor as valorUnitario,b.quantidade,b.valor,b.observacao 
        FROM tb_pedidos as a INNER JOIN 
        tb_pedido_produtos as b on a.id_pedido = b.id_pedido INNER JOIN
        tb_produtos as c on b.id_produto = c.id_produto INNER JOIN
        tb_clientes as d on d.id_cliente=a.id_cliente ORDER BY `a`.`id_pedido` ASC");
        if ($rs->execute()) {
          if ($rs->rowCount() > 0) {
            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
              echo "<tr>";
              echo "<th scope='row'>{$row->id_pedido}</td>";
              echo "<td scope='row'>{$row->nome}</td>";
              echo "<td>{$row->descricao}</td>";
              echo "<td>{$row->valorUnitario}</td>";
              echo "<td>{$row->quantidade}</td>";
              echo "<td>{$row->valor}</td>";
              echo "<td>{$row->observacao}</td>";
              
              echo "<td><form action='gerarPDF.php' method='POST' name='{$row->id_pedido}'>
              <input type='hidden' name='idPedido' value='{$row->id_pedido}'>
              <button class='btn btn-info' type='submit' name='Pedido'><i class='fas fa-edit'></i>Pedido Completo</button>
              </form></td>";

              echo "<td><form action='acaoPedido.php' method='POST' name='{$row->id_pedido}'>
              <input type='hidden' name='idPedido' value='{$row->id_pedido}'>
              <button class='btn btn-danger' type='submit' name='deletaPedido'>X</button>
              </form></td>";

              echo "<td><form action='acaoPedido.php' method='POST' name='{$row->id_pedido}'>
              <input type='hidden' name='idPedido' value='{$row->id_pedido}'>
              <button class='btn btn-secundary' type='submit' name='adicionaProduto'>+</button>
              </form></td>";

              echo "</tr>";
            }
          } 
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="jumbotron jumbotron-fluid py-3">
  <footer class="footer-copyright text-center py-3">
    @ 2019 Larissa Pinheiro Suppi
  </footer>
</div>

