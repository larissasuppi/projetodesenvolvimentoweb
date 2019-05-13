<?php
require 'validaLogin.php';

$id = '';
$descricao = '';
$valor = '';
$imagem = '';


if (isset($_POST['editaProduto'])) {

  $filtro = array('auxId' => $_POST['idProduto']);
  $rs = $pdo->prepare("SELECT id_produto,	descricao, valor, imagem FROM tb_produtos WHERE id_produto LIKE :auxId");
  if ($rs->execute($filtro)) {
    if ($rs->rowCount() > 0) {
      while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $id = $row->id_produto;
        $descricao = $row->descricao;
        $valor = $row->valor;
        $imagem = $row->imagem;
      }
    }
  }
}
?>
  
   <div class="container">
    <div class="row formulario">
      <div class="col-md-12">
        <div class="display-3">Produtos</div>
      </div>
    </div>
    <div class="row cadastro">
      <div class="col-md-12">
        <form class="form-group needs-validation justify-content-center" method="post" action="index.php" enctype="multipart/form-data" novalidate>
          <div class="form-row">

          <div class="col-md-2">
            <label for="idProduto">Código :</label>
            <input readonly value="<?php echo $id; ?>" type="text" name="idProduto" id="idProduto" class="form-control" arria-describeby="idClienteHelp" placeholder="ID Cliente">
            <small id="idClienteHelp" class="form-text text-muted">Informe o id do cliente.</small>
            </div>

             <div class="form-group col-md-10">
            <label for="descricao">Descrição</label>
            <input value="<?php echo $descricao; ?>" type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição completa para a venda" required>
          </div>
          </div>
          <div class="form-row">
           <div class="form-group col-md-2">
              <label for="valor">Preço</label>
              <input value="<?php echo $valor; ?>" type="text" class="form-control" id="valor" name="valor" placeholder="R$: " required>
            </div>

             <div class="form-group col-md-5">
              <label for="imagem">Foto: </label>
              <input value="<?php echo $imagem; ?>" type="file" class="form-control border-0" id="imagem" name="imagem" required>
            </div>
          </div>

          <?php
          if (isset($_POST['adicionarProduto'])) {
            echo "<div class='form-row'><div class='col'>";
            echo "<button type='submit' name='cadastrarProduto' id='addClienteDB' class='btn btn-warning form-control'><i class='fas fa-save'></i> Salvar</button>";
            echo "</div></div>";
          } elseif (isset($_POST['editaProduto'])) {
            echo "<div class='form-row'><div class='col'>";
            echo "<button type='submit' name='editarProduto' id='editClienteDB' class='btn btn-secondary form-control'><i class='fas fa-save'></i> Salvar</button>";
            echo "</div><div class='col'>";
            echo "<button type='submit' name='deletaProduto' id='excluiClienteDB' class='btn btn-danger form-control'><i class='far fa-trash-alt'></i> Excluir</button>";
            echo "</div></div>";
          }
          ?>  
        </form>
       

      </div>
    </div>
</div>
    <div class="jumbotron jumbotron-fluid py-3">
    <footer class="footer-copyright text-center py-3">
      @ 2019 Larissa Pinheiro Suppi
    </footer>
  </div>