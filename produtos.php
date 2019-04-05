   <div class="container">
    <div class="row formulario">
      <div class="col-md-12">
        <div class="display-3">Produtos</div>
      </div>
    </div>
    <div class="row cadastro">
      <div class="col-md-12">
        <form class="form-group needs-validation justify-content-center" method="post" action="index.php" novalidate>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="inputCodigo">Código</label>
              <input type="text" class="form-control" id="inputCodigo" placeholder="Código" name="codigo" required="">
            </div>
             <div class="form-group col-md-10">
            <label for="inputDesc">Descrição</label>
            <input type="text" class="form-control" id="inputDesc" placeholder="Digite a descrição completa para a venda" required>
          </div>
          </div>
          <div class="form-row">
           <div class="form-group col-md-2">
              <label for="inputPreco">Preço</label>
              <input type="text" class="form-control" id="inputPreco" placeholder="R$: " required>
            </div>
             <div class="form-group col-md-5">
              <label for="inputFoto">Foto: </label>
              <input type="file" class="form-control border-0" id="inputFoto" required>
            </div>
          </div>
          <div id="botao">
            <button type="submit" class="btn btn-warning mb-2" id="botao" name="adicionarProduto">Cadastrar</button>
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