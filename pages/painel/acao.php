<?php
require_once('../classes/autoload.php');
session_start();

echo "<br> POST: ";
var_dump($_POST);
echo "<br> GET: ";
var_dump($_GET);
echo "<br> SESSION: ";
var_dump($_SESSION);
echo "<br>";

$acao = "";
$produto = null; // Declare a variável $produto antes de usá-la.

$aviso = isset($_GET['aviso']) ? $_GET['aviso'] : '';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        break;
    case 'POST':
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        break;
}

if ($acao == 'saveCategory') { // Change to saveCategory
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $establishmentId = isset($_POST['establishment_id']) ? $_POST['establishment_id'] : 0;

    $category = new Category($id, $name, $establishmentId);

    if ($id == 0) {
        if ($category->inserir()) {
            echo "Deu certo =) <br> Criar";
            header("Location: index.php?aviso=CadastradoC&acao=createCategory");
            exit();
        } else {
            echo "Deu errado =( <br> Criar";
            header("Location: index.php?aviso=NaoCadastradoC&acao=createCategory");
            exit();
        }
    } else {
        try {
            if ($category->editar()) {
                echo "Deu certo =) <br> Editar";
                header("Location: index.php?aviso=EditadoC&acao=createCategory");
                exit();
            } else {
                echo "Deu errado =( <br> Editar";
                header("Location: index.php?aviso=NaoEditadoC&acao=createCategory");
                exit();
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
} elseif ($acao == 'deleteCategory') { // Change to deleteCategory
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $name = '';

    $category = new Category($id, $name, 0);

    try {
        if ($category->excluir()) {
            echo "Deu certo =) <br> Excluir";
            header("Location: index.php?aviso=ExcluidoC&acao=createCategory");
            
            exit();
        } else {
            echo "Deu errado =( <br> Excluir";
            header("Location: index.php?aviso=NaoExcluidoC&acao=createCategory");
            exit();
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} elseif ($acao == 'editCategory') { // Change to editCategory
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $establishmentId = isset($_POST['establishment_id']) ? $_POST['establishment_id'] : 0;

    $category = new Category($id, $name, $establishmentId);

    try {
        if ($category->editar()) {
            echo "Deu certo =) <br> Editar";
            header("Location: index.php?aviso=EditadoC&acao=createCategory");
            exit();
        } else {
            echo "Deu errado =( <br> Editar";
            header("Location: index.php?aviso=NaoEditadoC&acao=createCategory");
            exit();
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}



if ($acao == 'saveProduct') {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : 0;
    $img = isset($_POST['img']) ? $_POST['img'] : 0;
    $category_id = isset($_POST['categorias']) ? $_POST['categorias'][0] : 0;

    $produto = new Product($id, $name, $description, $price, $img, $category_id);

    if ($id == 0) {
        if ($produto->inserir()) {
            echo "Deu certo =) <br> Criar";
            header("Location: index.php?aviso=CadastradoP&acao=createProduct");
            exit();
        } else {
            echo "Deu errado =( <br> Criar";
            header("Location: index.php?aviso=NaoCadastradoP&acao=createProduct");
            exit();
        }
    } else {
        try {
            if ($produto->editar()) {
                echo "Deu certo =) <br> Editar";
                header("Location: index.php?aviso=EditadoP&acao=createProduct");
                exit();
            } else {
                echo "Deu errado =( <br> Editar";
                header("Location: index.php?aviso=NaoEditadoP&acao=createProduct");
                exit();
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
} elseif ($acao == 'deleteProduct') {
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $name = '';

    $produto = new Product($id, $name, '', 0, '','');
    try {
        if ($produto->excluir()) {
            echo "Deu certo =) <br> Excluir";
            header("Location: index.php?aviso=ExcluidoP&acao=createProduct");
            exit();
        } else {
            echo "Deu errado =( <br> Excluir";
            header("Location: index.php?aviso=NaoExcluidoP&acao=createProduct");
            exit();
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} elseif ($acao == 'editProduct') {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : 0;
    $img = isset($_POST['img']) ? $_POST['img'] : 0;
    $category_id = isset($_POST['categorias']) ? $_POST['categorias'][0] : 0;

    $produto = new Product($id, $name, $description, $price, $img, $category_id);
    try {
        if ($produto->editar()) {
            echo "Deu certo =) <br> Editar";
            header("Location: index.php?aviso=EditadoP&acao=createProduct");
            exit();
        } else {
            echo "Deu errado =( <br> Editar";
            header("Location: index.php?aviso=NaoEditadoP&acao=createProduct");
            exit();
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

if ($acao == 'editEstablishment') {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
    $zip_code = isset($_POST['zip_code']) ? $_POST['zip_code'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $culinary_style_id = isset($_POST['culinary_style_id']) ? $_POST['culinary_style_id'] : '';
    $owner_id = isset($_POST['owner_id']) ? $_POST['owner_id'] : '';

    $estabelecimento = new Establishment($id, $name, $cnpj, $zip_code, $phone, $address, $culinary_style_id, $owner_id);

    try {
        if ($estabelecimento->editar()) {
            echo "Estabelecimento editado com sucesso";
            header("Location: index.php?aviso=Editado");
            exit();
        } else {
            echo "Erro ao editar o estabelecimento";
            header("Location: index.php?aviso=NaoEditado");
            exit();
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        echo "SQL: " . $sql; // Exibe a consulta SQL no caso de uma exceção.
    }
}
?>
