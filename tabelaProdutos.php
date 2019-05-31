<div class="container">
  <div class="row formulario">
    <div class="col-md-12">
      <div class="display-3">Produtos</div>
    </div>
  </div>
  <div class="row cadastro">
    <div class="col-md-12">
      <form action="index.php" method="post">
        <div id="botao">
          <button type="submit" class="btn btn-warning mb-2" id="botao" name="adicionarProduto">Adicionar Produto</button>
        </div>
      </form>
      <hr>
      </form>

      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Imagem</th>
            <th scope="col"><button type="submit" class="btn btn-light"><i class="far fa-trash-alt"></i></button></th>
            <th scope="col"><button type="submit" class="btn btn-light"><i class="far fa-edit"></i></button></th>

          </tr>
        </thead>

        <tbody> <?php
                //busca os clientes
                $filtro = array('auxNome' => '%%');
                $rs = $pdo->prepare("SELECT id_produto,descricao,valor,imagem
                  FROM tb_produtos WHERE descricao LIKE :auxNome");
                if ($rs->execute($filtro)) {
                  if ($rs->rowCount() > 0) {
                    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                      echo "<tr>";
                      echo "<th scope='row'>{$row->id_produto}</td>";
                      echo "<td>{$row->descricao}</td>";
                      echo "<td>{$row->valor}</td>";
                      echo "<td><img src='{$row->imagem}' width=120></td>";

                      echo "<td><form action='index.php' method='POST' name='delProduto{$row->id_produto}'>
                      <input type='hidden' name='idProduto' value='{$row->id_produto}'>
                      <button class='btn btn-warning' type='submit' name='deletaProduto'><i class='far fa-trash-alt'></i></button>
                      </form></td>";


                      echo "<td><form action='index.php' method='POST' name='editProduto{$row->id_produto}'>
                      <input type='hidden' name='idProduto' value='{$row->id_produto}'>
                      <button class='btn btn-warning' type='submit' name='editaProduto'><i class='far fa-edit'></i></button>
                      </form></td>";
                      echo "</tr>";
                    }
                  }
                }

                echo "</tbody>";
                ?>

      </table>




    </div>
  </div>
</div>

<div class="jumbotron jumbotron-fluid py-3">
  <footer class="footer-copyright text-center py-3">
    @ 2019 Larissa Pinheiro Suppi
  </footer>
</div>