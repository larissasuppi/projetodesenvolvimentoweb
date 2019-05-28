<?php
include 'validaSessao.php';

$rs = $pdo->prepare("SELECT * FROM tb_produtos WHERE descricao LIKE '%or%'");
$rs->execute();
$listarProdutos = $rs->fetchall(PDO::FETCH_OBJ);
?>
<form action="index.php" method="POST">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <table class="table ">
                    <thead>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Imagem</th>
                    </thead>
                    <tbody> 
                        <?php foreach ($listarProdutos as $l): ?>
                            <tr>
                                <td width="20px"><?php echo $l->id_produto; ?></td>
                                <td width="75%"><?php echo $l->descricao; ?></td> 
                                <td width="5%"><?php echo $l->valor; ?></td>
                                <td width="10%"><img src="<?php echo $l->imagem; ?>" class="img-responsive previewNoticia"></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody> 
                </table>
            </div>
        </div>
</form>


