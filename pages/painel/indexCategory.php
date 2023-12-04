<?php
    if (isset($_GET['edit_id'])) {
        $editCategoryId = $_GET['edit_id'];
        $editCategory = Category::listar(1, $editCategoryId);
        if ($editCategory) {
            $editName = $editCategory->getName();
            $editEstablishmentId = $editCategory->getEstablishmentId();
        } else {
            echo "Categoria não encontrada.";
        }
    }
    // echo "<br> POST: ";
    // var_dump($_POST);
    // echo "<br> GET: ";
    // var_dump($_GET);
    // echo "<br> SESSION: ";
    // var_dump($_SESSION);
    // echo "<br>";

    
?>
<center>
    <form action="acao.php" method="post" id="categoryForm">
        <?php if (isset($editCategoryId)) { ?>
            <input type="hidden" name="id" value="<?php echo $editCategoryId; ?>">
        <?php } ?>
        <div class="row">
            <center><h3><?php echo isset($editCategoryId) ? 'Editar a Categoria:' : 'Crie a sua Categoria:'; ?></h3></center>
            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        <fieldset class="custom-fieldset">
                            <legend id="custom-legend">Nome*</legend>
                            <input type="text" placeholder="Nome da categoria" class="form-control offInput" name="name" value="<?php echo isset($editName) ? $editName : ''; ?>">
                        </fieldset>
                    </div>   
                    <div class="col-2"></div>                 
                    <input type="hidden" placeholder="ID do estabelecimento" class="form-control offInputA" name="establishment_id" value="<?php echo $_SESSION['EstabelecimentoID'] ?>">
                    <div class="col-1">
                        <button type="submit" class="btn bLaranja" style="margin-top: 3.5vh;" name="acao" value="<?php echo isset($editCategoryId) ? 'editCategory' : 'saveCategory'; ?>"><?php echo isset($editCategoryId) ? 'Salvar' : 'Criar'; ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div>
        <div class="row">
            <?php
            $categories = Category::listar();

            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>ID do Estabelecimento</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>";

            foreach ($categories as $category) {
                echo '<tr>
                        <td>' . $category->getId() . '</td>
                        <td>' . $category->getName() . '</td>
                        <td>' . $category->getEstablishmentId() . '</td>
                        <td><a href="?edit_id=' . $category->getId() . '&acao=createCategory"><img src="../../assets/img/iconEdit.png" class="iconA" alt="Editar"></a></td>
                        <td><a href="#" onclick="confirmDeleteCategory(' . $category->getId() . ')"><img src="../../assets/img/iconTrash.png" class="iconA" alt="Excluir"></a></td>
                    </tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>
</center>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        confirmDeleteInit();
    });

    function confirmDeleteCategory(categoryId) {
        var confirmDeleteCategory = confirm("Tem certeza que deseja excluir esta categoria?");
        if (confirmDeleteCategory) {
            window.location.href = "acao.php?id=" + categoryId + "&acao=deleteCategory";
        }
    }
</script>