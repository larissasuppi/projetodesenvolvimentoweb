<?php
require 'validaLogin.php';
$id = '';
$nome = '';
$endereco = '';
$numero = '';
$observacao = '';
$cep = '';
$bairro = '';
$cidade = '';
$estado = '';
$telefone = '';
$email = '';
if (isset($_POST['editaCliente'])) {
  $filtro = array('auxId' => $_POST['idCliente']);
  $rs = $pdo->prepare("SELECT id_cliente,nome,endereco,numero,observacao,cep,bairro,cidade,estado,telefone,email FROM tb_clientes WHERE id_cliente LIKE :auxId");
  if ($rs->execute($filtro)) {
    if ($rs->rowCount() > 0) {
      while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $id = $row->id_cliente;
        $nome = $row->nome;
        $endereco = $row->endereco;
        $numero = $row->numero;
        $observacao = $row->observacao;
        $cep = $row->cep;
        $bairro = $row->bairro;
        $cidade = $row->cidade;
        $estado = $row->estado;
        $telefone = $row->telefone;
        $email = $row->email;
      }
    }
  }
}
?>


<div class="container">
  <div class="row formulario">
    <div class="col-md-12">
      <div class="display-3">Cadastro de Clientes</div>
    </div>
  </div>
  <div class="row cadastro">
    <div class="col-md-12">
      <form class="form-group needs-validation justify-content-center" method="POST" action="index.php" novalidate>
        <div class="form-row">
          <div class="col-md-2">
            <label for="idCliente">Código :</label>
            <input readonly value="<?php echo $id; ?>" type="text" name="idCliente" id="idCliente" class="form-control" arria-describeby="idClienteHelp" placeholder="ID Cliente">
            <small id="idClienteHelp" class="form-text text-muted">Informe o id do cliente.</small>
          </div>
          <div class="form-group col-md-10 ">
            <label for="nomeCliente">Nome do Cliente: </label><br>
            <input value="<?php echo $nome; ?>" arria-describeby="nomeClienteHelp" type="text" class="form-control" id="nomeCliente" name="nome" required>
            <small id="nomeClienteHelp" class="form-text text-muted">Informe o Nome do cliente.</small>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="endereco">Endereço</label>
            <input value="<?php echo $endereco; ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="" required="">

          </div>
          <div class="form-group col-md-4">
            <label for="numero">Número</label>
            <input value="<?php echo $numero; ?>" type="text" class="form-control" id="numero" name="numero" placeholder="" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="observacao">Observação: </label>
            <input value="<?php echo $observacao; ?>" type="text" class="form-control" id="observacao" name="observacao" placeholder="Observação" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="cep">CEP: </label>
            <input value="<?php echo $cep; ?>" type="text" class="form-control" id="cep" name="cep" placeholder="88500-XXX" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="bairro">Bairro:</label>
            <input value="<?php echo $bairro; ?>" type="text" class="form-control" id="bairro" name="bairro" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="cidade">Cidade: </label>
            <input value="<?php echo $cidade; ?>" type="text" class="form-control" id="cidade" name="cidade" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="estado">Estado: </label>
            <select value="<?php echo $estado; ?>" id="estado" name="estado" class="form-control">
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
            <label for="telefone">Telefone</label>
            <input value="<?php echo $telefone; ?>"" type=" text" class="form-control" id="telefone" name="telefone" placeholder="(__) _____-____" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="email">E-mail: </label>
            <input value="<?php echo $email; ?>" type="email" class="form-control" id="email" name="email" placeholder="" required="">
          </div>
        </div>
        <?php
        if (isset($_POST['adicionar'])) {
          echo "<div class='form-row'><div class='col'>";
          echo "<button type='submit' name='cadastrarCliente' id='addClienteDB' class='btn btn-warning form-control'><i class='fas fa-save'></i> Salvar</button>";
          echo "</div></div>";
        } elseif (isset($_POST['editaCliente'])) {
          echo "<div class='form-row'><div class='col'>";
          echo "<button type='submit' name='editarCliente' id='editClienteDB' class='btn btn-secondary form-control'><i class='fas fa-save'></i> Salvar</button>";
          echo "</div><div class='col'>";
          echo "<button type='submit' name='deletaCliente' id='excluiClienteDB' class='btn btn-danger form-control'><i class='far fa-trash-alt'></i> Excluir</button>";
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