
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
            <label for="inputPedido">Pedido: </label>
            <input type="number" class="form-control" id="inputPedido" placeholder="Número" required="">
          </div>
          <div class="form-group col-md-2 ">
            <label for="phone_with_ddd">Telefone: </label><br>
            <input type="text" class="form-control"  maxlength="12" id="phone_with_ddd" name="telefone" placeholder="(__)_____-____" required>
          </div>
          <div class="form-group col-md-2">
            <label for="codeClient">Código do Cliente:</label>
            <input type="text" class="form-control"  id="codeClient" required>
          </div>
          <div class="form-group col-md-7">
            <label for="inputName">Nome do Cliente:</label>
            <input type="text" class="form-control" placeholder="Nome completo do cliente" id="inputName" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputAddress">Endereço: </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Nome da rua" required="">
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
            <label for="inputBairro">Bairro: </label>
            <input type="text" class="form-control" id="inputBairro" placeholder="Ex.: Coral" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="inputCidade">Cidade: </label>
            <input type="text" class="form-control" id="inputCidade" placeholder="Ex.: Lages" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-9">
            <label for="inputObs">Obs.: </label>
            <input type="text" class="form-control" id="inputObs" placeholder="Digite aqui sua observação do endereço" name="observacao" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputData">Data/Hora Local: </label>
            <input type="datetime-local" class="form-control" id="inputData" name="observacao" required>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-md-1">
            <label for="inputProduto">Produto: </label>
            <input type="text" class="form-control" id="inputProduto" placeholder="Código" name="codigoProduto" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputDesc">Descrição: </label>
            <input type="text" class="form-control" id="inputDesc" name="descricaoProduto" required>
          </div>
          <div class="form-group col-md-1">
            <label for="inputPreco">Preço: </label>
            <input type="text" class="form-control" id="inputPreco" placeholder="R$: " name="preco" required>
          </div>
          <div class="form-group col-md-1">
            <label for="inputQntd">Quant: </label>
            <input type="text" class="form-control" id="inputQntd" name="quantidade" required>
          </div>
          <div class="form-group col-md-1">
            <label for="inputTotal">Total R$: </label>
            <input type="text" class="form-control" id="inputTotal" name="total" required>
          </div>
          <div class="form-group col-md-5">
            <label for="inputObsProd">Obs.: </label>
            <input type="text" class="form-control" id="inputObsProd" name="obsProduto" required>
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

