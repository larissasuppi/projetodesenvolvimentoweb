 <div class="container">
    <div class="row formulario">
      <div class="col-md-12">
        <div class="display-3">Cadastro de Clientes</div>
      </div>
    </div>
    <div class="row cadastro">
      <div class="col-md-12">
        <form class="form-group needs-validation justify-content-center" method="post" action="index.php" novalidate>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCodigo">Código: </label>
              <input type="text" class="form-control" id="inputCodigo" placeholder="Código" required="">
            </div>
            <div class="form-group col-md-8 ">
              <label for="inputName">Nome do Cliente: </label><br>
              <input type="text" class="form-control" id="inputName" name="Nome" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputAddress">Endereço</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="" required="">
          </div>
          <div class="form-group col-md-4">
            <label for="numero">Número</label>
            <input type="text" class="form-control" id="numero" placeholder="" required="">
          </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputObs">Observação: </label>
              <input type="text" class="form-control" id="inputObs" placeholder="Observação" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="cep">CEP: </label>
              <input type="text" class="form-control" id="cep" placeholder="88500-XXX" required="">
            </div>
             <div class="form-group col-md-3">
              <label for="inputBairro">Bairro:</label>
              <input type="text" class="form-control" id="inputBairro" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="cidade">Cidade: </label>
              <input type="text" class="form-control" id="cidade" required="">
            </div>
             <div class="form-group col-md-3">
              <label for="estado">Cidade</label>
              <select id="estado" name="estado" class="form-control">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="ES">Estrangeiro</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="phone_with_ddd">Telefone</label>
            <input type="text" class="form-control" id="phone_with_ddd" placeholder="(__) _____-____" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="email">E-mail: </label>
            <input type="email" class="form-control" id="email" placeholder="" required="">
          </div>
          </div>
          <div id="botao">
            <button type="submit" name="cadastrarCliente" class="btn btn-warning mb-2" id="botao">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <div class="jumbotron jumbotron-fluid py-3">
    <footer class="footer-copyright text-center py-3">
      @ 2019 Larissa Pinheiro Suppi
    </footer>
  </div>