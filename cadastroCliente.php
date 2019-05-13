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
                    <th scope="col"><button type="submit" class="btn btn-light" ><i class="far fa-trash-alt"></i></button></th>
                    <th scope="col"><button type="submit" class="btn btn-light"><i class="far fa-edit"></i></button></th>

                  </tr>
                </thead>
                
                <tbody> <?php
        //busca os clientes
                $filtro = array('auxNome' => '%%');
                $rs = $pdo->prepare("SELECT id_cliente,nome,endereco,numero,
                  observacao,cep,bairro,cidade,estado,telefone,email 
                  FROM tb_clientes WHERE nome LIKE :auxNome");
                if ($rs->execute($filtro)) {
                  if ($rs->rowCount() > 0) {
                    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                      echo "<tr>";
                      echo "<th scope='row'>{$row->id_cliente}</td>";
                      echo "<td>{$row->nome}</td>";
                      echo "<td>{$row->endereco}</td>";
                      echo "<td>{$row->numero}</td>";
                      echo "<td>{$row->observacao}</td>";
                      echo "<td>{$row->cep}</td>";
                      echo "<td>{$row->bairro}</td>";
                      echo "<td>{$row->cidade}</td>";
                      echo "<td>{$row->estado}</td>";
                      echo "<td>{$row->telefone}</td>";
                      echo "<td>{$row->email}</td>";

                      echo "<td><form action='index.php' method='POST' name='delCliente{$row->id_cliente}'>
                      <input type='hidden' name='idCliente' value='{$row->id_cliente}'>
                      <button class='btn btn-warning' type='submit' name='deletaCliente'><i class='far fa-trash-alt'></i></button>
                      </form></td>";


                      echo "<td><form action='index.php' method='POST' name='editCliente{$row->id_cliente}'>
                      <input type='hidden' name='idCliente' value='{$row->id_cliente}'>
                      <button class='btn btn-warning' type='submit' name='editaCliente'><i class='far fa-edit'></i></i></button>
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
