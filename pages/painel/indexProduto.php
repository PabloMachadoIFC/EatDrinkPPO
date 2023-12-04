<?php
    if (isset($_GET['edit_id'])) {
        $editProductId = $_GET['edit_id'];
        $editProduct = Product::listar(1, $editProductId);    
        if ($editProduct) {
            $editName = $editProduct->getName();
            $editPrice = $editProduct->getPrice();
            $editDescription = $editProduct->getDescription();
            $editCategoryId = $editProduct->getCategoryId();
        } else {
            echo "Produto não encontrado.";
        }
    }
    $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : '';
?>
<div class="container">
    <form action="acao.php" method="post" id="productForm">
        <?php if (isset($editProductId)) { ?>
            <input type="hidden" name="id" value="<?php echo $editProductId; ?>">
        <?php } ?>
        <div class="row">
            <center><h3><?php echo isset($editProductId) ? 'Editar o Produto:' : 'Crie o seu Produto:'; ?></h3></center>
                <div class="row">
                <div class="col-1">
                    <form method="post" action="acao.php" enctype="multipart/form-data">
                        <label for="categoria_pic">
                            <?php

                            if (isset($editProduct) && $editProduct->getImg() !== null) {
                                echo '<img src="../../assets/img/' . $editProduct->getImg() . '" class="img1 fotoCategoriaB" alt="Imagem atual" style="width: 100px; height: 100px; margin-top: 0vh;">';
                            } else {
                                echo '<img src="../../assets/img/Upload.png" class="img1 fotoCategoriaB" alt="Selecione uma imagem" style="width: 100px; height: 100px; margin-top: 0vh;">';
                            }
                            ?>
                        </label>
                        <input id="categoria_pic" type="file" name="img" accept="image/*" style="display: none;">
                    </form>
                </div>
                    <div class="col-1"></div>
                    <div class="col-10">
                        <fieldset class="custom-fieldset">
                            <legend id="custom-legend">Imagem*</legend>
                            <input type="text" placeholder="Link da Imagem" class="form-control offInput" name="name" value="<?php echo isset($editImg) ? $editImg : ''; ?>">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <fieldset class="custom-fieldset">
                            <legend id="custom-legend">Nome do produto*</legend>
                            <input type="text" placeholder="Ex.: BATATA RÚSTICA E GORGONZOLA (400g)" class="form-control offInput" name="name" value="<?php echo isset($editName) ? $editName : ''; ?>">
                        </fieldset>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-3">
                        <fieldset class "custom-fieldsetA">
                            <legend style="width: 5vh;" id="custom-legendA">Preço*</legend>
                            <input type="number" placeholder="R$ 0,00" class="form-control offInputA" name="price" value="<?php echo isset($editPrice) ? $editPrice : ''; ?>">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset class="custom-fieldsetB">
                            <legend id="custom-legendB">Descrição*</legend>
                            <textarea name="description" placeholder="Ex.: Batata rústica com creme de gorgonzola, farofa de bacon, crispy, parmesão e mel. Acompanha maionese verde." class="form-control" cols="5" rows="3"><?php echo isset($editDescription) ? $editDescription : ''; ?></textarea>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <fieldset class="custom-fieldsetA">
                            <legend style="width: 5vh;" id="custom-legendA">Categorias*</legend>
                            <select class="form-control" name="categorias[]" id="categorias">
                                <?php
                                    $categorias = Category::listar();
                                    foreach ($categorias as $categoria) {
                                        $selected = isset($editCategoryId) && $categoria->getId() == $editCategoryId ? 'selected' : '';
                                        echo "<option value='{$categoria->getId()}' $selected>{$categoria->getName()}</option>";
                                    }
                                ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-1">
                        <button type="submit" class="btn bLaranja" style="margin-top: 3.5vh;"  data-bs-dismiss="offcanvas" name="acao" value="<?php echo isset($editProductId) ? 'editProduct' : 'saveProduct'; ?>"><?php echo isset($editProductId) ? 'Salvar' : 'Criar'; ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div>
        <div class="row">
            <?php
            $produtos = Product::listar();

            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Imagem</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>";

            foreach ($produtos as $info) {
                if (is_array($info)) {
                    $info = new Product($info['id'], $info['name'], $info['description'], $info['price'], $info['img'], $info['category_id']);
                }

                echo '<tr>
                        <td>' . $info->getId() . '</td>
                        <td>' . $info->getName() . '</td>
                        <td> R$' . $info->getPrice() . ',00</td>
                        <td> <img src="../../assets/img/' . $info->getImg() . '"style="width: 50%; height: 10vh;"></td>
                        <td>';

                $categorias = Category::listar(1, $info->getCategoryId());

                if (!empty($categorias)) {
                    echo "(". $categorias->getId(). ") ". $categorias->getName();
                } else {
                    echo "Categoria não encontrada";
                }
                echo '</td>
                        <td>' . $info->getDescription() . '</td>
                        <td><a href="?edit_id=' . $info->getId() . '&acao=createProduct"><img src="../../assets/img/iconEdit.png" class="iconA" alt="Editar"></a></td>';
                        //<td><a href="acao.php?id=' . $info->getId() . '&acao=deleteProduct"><img src="../../assets/img/iconTrash.png" class="iconA" alt="Excluir"></a></td>
                    echo'<td><a href="#" onclick="confirmDelete(' . $info->getId() . ')"><img src="../../assets/img/iconTrash.png" class="iconA" alt="Excluir"></a></td>
                    </tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        confirmDeleteInit();
    });
    function confirmDelete(productId) {
        var confirmDelete = confirm("Tem certeza que deseja excluir este produto?");
        if (confirmDelete) {
            window.location.href = "acao.php?id=" + productId + "&acao=deleteProduct";
        }
    }
</script>