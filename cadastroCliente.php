<div class="container-fluid">
  <div class="row formulario">
    <div class="col-md-12">
      <div class="display-3">Clientes</div>
    </div>
  </div>
  <div class="row cadastro">
    <div class="col-md-12">
      <form action="index.php" method="post">
        <div id="botao">
        <button type="submit" class="btn btn-warning mb-2" id="botao" name="adicionar">Adicionar Cliente</button>
      </div>
      </form>
      <hr>
    </form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Endereço:</th>
          <th scope="col">Número:</th>
          <th scope="col">Observação:</th>
          <th scope="col">CEP:</th>
          <th scope="col">Bairro:</th>
          <th scope="col">Cidade:</th>
          <th scope="col">Estado:</th>
          <th scope="col">Telefone:</th>
          <th scope="col">E-mail:</th>
          <th scope="col"><button type="submit" class="btn btn-warning">Editar</button></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Larissa Pinheiro Suppi</td>
          <td>Rua Benjamim Suppi</td>
          <td>989</td>
          <td>Casa</td>
          <td>88590-000</td>
          <td>Centro</td>
          <td>Anita Garibaldi</td>
          <td>SC</td>
          <td>49988216106</td>
          <td>issasuppi@hotmail.com</td>
          <td><button type="submit" name="editar" class="btn btn-warning"> Editar: 1</button></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Luiz Felipe Pinheiro Suppi</td>
          <td>Rua Benjamim Suppi</td>
          <td>989</td>
          <td>Casa</td>
          <td>88590-000</td>
          <td>Centro</td>
          <td>Anita Garibaldi</td>
          <td>SC</td>
          <td>49988071910</td>
          <td>luizfelipepsuppi@yahoo.com.br</td>
          <td><button type="submit" name="editar" class="btn btn-warning"> Editar: 1</button></td>
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
