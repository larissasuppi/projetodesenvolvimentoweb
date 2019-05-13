
<div class="container">
  <div class="row formulario">
    <div class="col-md-12">
      <div class="display-3">Pedidos</div>
    </div>
  </div>
  <div class="row cadastro">
    <div class="col-md-12">
      <form class="form-group needs-validation justify-content-center" action="index.php" method="post" novalidate>
        <div class="form-row">
          <div class="form-group col-md-1">
            <label for="pedido">Pedido: </label>
            <input type="number" class="form-control" id="pedido" placeholder="Número" required="">
          </div>
          <div class="form-group col-md-2 ">
            <label for="telefone">Telefone: </label><br>
            <input type="text" class="form-control"  maxlength="12" id="telefone" name="telefone" placeholder="(__)_____-____" required>
          </div>
          <div class="form-group col-md-2">
            <label for="codigoCliente">Código do Cliente:</label>
            <input type="text" class="form-control"  id="codigoCliente" required>
          </div>
          <div class="form-group col-md-7">
            <label for="nomeCliente">Nome do Cliente:</label>
            <input type="text" class="form-control" placeholder="Nome completo do cliente" id="nomeCliente" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="endereco">Endereço: </label>
            <input type="text" class="form-control" id="endereco" placeholder="Nome da rua" required="">
          </div>
          <div class="form-group col-md-1">
            <label for="numero">Número: </label>
            <input type="text" class="form-control" id="numero" placeholder="" required="">
          </div>
          <div class="form-group col-md-2">
            <label for="cep">CEP: </label>
            <input type="text" class="form-control" placeholder="88500-XXX" id="cep" required="">
          </div>
          <div class="form-group col-md-2">
            <label for="bairro">Bairro: </label>
            <input type="text" class="form-control" id="bairro" placeholder="Ex.: Coral" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="cidade">Cidade: </label>
            <input type="text" class="form-control" id="cidade" placeholder="Ex.: Lages" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-9">
            <label for="observacao">Obs.: </label>
            <input type="text" class="form-control" id="observacao" placeholder="Digite aqui sua observação do endereço" name="observacao" required>
          </div>
          <div class="form-group col-md-3">
            <label for="data">Data/Hora Local: </label>
            <input type="datetime-local" class="form-control" id="data" name="observacao" required>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-md-1">
            <label for="produto">Produto: </label>
            <input type="text" class="form-control" id="produto" placeholder="Código" name="codigoProduto" required>
          </div>
          <div class="form-group col-md-3">
            <label for="descricaoProduto">Descrição: </label>
            <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" required>
          </div>
          <div class="form-group col-md-1">
            <label for="preco">Preço: </label>
            <input type="text" class="form-control" id="preco" placeholder="R$: " name="preco" required>
          </div>
          <div class="form-group col-md-1">
            <label for="quantidade">Quant: </label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" required>
          </div>
          <div class="form-group col-md-1">
            <label for="total">Total R$: </label>
            <input type="text" class="form-control" id="total" name="total" required>
          </div>
          <div class="form-group col-md-5">
            <label for="observacaoProduto">Obs.: </label>
            <input type="text" class="form-control" id="observacaoProduto" name="obsProduto" required>
          </div>
        </div>
        <div id="botao">
          <button type="submit" class="btn btn-warning mb-2" id="botao" name="adicionarPedido">Adicionar</button>
        </div>
        <hr>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Total R$</th>
            <th scope="col">Obs.:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Arroz</td>
            <td>10,00</td>
            <td>5</td>
            <td>50,00</td>
            <td>Arroz Maletti</td>
          </tr>
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

