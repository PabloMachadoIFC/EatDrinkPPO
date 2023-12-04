<?php
include("../../admin.php");
require_once('../../../classes/autoload.php');
require_once('acao.php');

$aviso = isset($_GET['aviso']) ? $_GET['aviso'] : "";
switch ($aviso) {
    case 'Cadastrado':
        $msg = "Category Cadastrada!";
        alert($msg);
        break;
    case 'NaoCadastrado':
        $msg = "Category Não Cadastrada!";
        alert($msg);
        break;
    case 'Excluido':
        $msg = "Category Excluída!";
        alert($msg);
        break;
    case 'NaoExcluido':
        $msg = "Category Não Excluída!";
        alert($msg);
        break;
    case 'Editado':
        $msg = "Category Editada!";
        alert($msg);
        break;
    case 'NaoEditado':
        $msg = "Category Não Editada!";
        alert($msg);
        break;
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function confirm($msg) {
    echo "<script type='text/javascript'>confirm('$msg');</script>";
}

$category = new Category(6, 'example', 1);
$qeditando = null;

$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id > 0) {
    $dados = $category->listar(1, $id);
    if (!empty($dados)) {
        $qeditando = $dados[0];
    }
}
?>

<center><h1>CRUD Category</h1></center>
<div style="margin: 5vh;">
    <div class="col-12">
        <form action="CRUD/category/acao.php" method="post">
            <div class="row">
                <input type="hidden" name="id" id="id" class="form-control" readonly value="<?= isset($qeditando) ? $qeditando->getId() : 0 ?>">
                <div class="col-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= isset($qeditando) ? $qeditando->getName() : '' ?>">
                </div>
                <div class="col-6">
                    <label for="empresa">Empresa</label>
                    <select name="establishment_id" id="empresa" class="form-control">
                        <?php
                        $establishments = Establishment::listar(); // Altere o nome do método de acordo com a sua implementação
                        foreach ($establishments as $estabelecimento) {
                            $selected = isset($qeditando) && $qeditando->getEstablishmentId() == $estabelecimento['id'] ? 'selected' : '';
                            echo '<option value="' . $estabelecimento['id'] . '" ' . $selected . '>' . $estabelecimento['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12" style="margin-top: 1vh;">
                    <center>
                        <button type="submit" class="btn btn-primary" name="acao" value="<?= isset($qeditando) ? 'editar' : 'salvar' ?>"><?= isset($qeditando) ? 'Editar Category' : 'Criar Category'; ?></button>
                    </center>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Estabelecimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $category->listar();
                foreach ($lista as $q) {
                    echo '<tr>
                        <td>' . $q->getId() . '</td>
                        <td>' . $q->getName() . '</td>
                        <td>' . $q->getEstablishmentId() . '</td>
                        <td>
                            <a class="btn btn-secondary" href="CRUD/category/index.php?acao=editar&id=' . $q->getId() . '">Editar</a>
                            <a class="btn btn-danger" href="CRUD/category/acao.php?acao=excluir&id=' . $q->getId() . '">Excluir</a>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include("../../admin2.php");
?>
