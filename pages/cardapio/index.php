<?php
session_start();
require_once('../classes/autoload.php');

$path = '../conf/conf.inc.php';
if (file_exists($path))
    include_once($path);
$path = '../../conf/conf.inc.php';
if (file_exists($path))
    include_once($path);

// echo "<br> POST: ";
// var_dump($_POST);
// echo "<br> GET: ";
// var_dump($_GET);
// echo "<br> SESSION: ";
// var_dump($_SESSION);
// echo "<br>";

// if ($_SESSION['email'] == null) {
//     header("Location: ../login/acao.php?acao=logoff");
//     exit(); 
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAT DRINK - PAINEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/cardapio.css">
</head>

<body class="">
    <div class="row flaranja" style="background-color: #F67B30;height: 30vh;">
        <img src="../../assets/img/Upload.png" alt="img" style="width: 16vh;height: 16vh; margin-left: 10vh; margin-top: 20vh;">
        <h3 style="width: 16vh;height: 16vh; margin-left: 0vh; margin-top: 31vh;"></h3>
    </div>
    <br><br><br><hr>

    <div class="row">
        <div class="col-1">
            <img src="../../assets/img/pesquisa.png" alt="img" style="width: 3vh;height: 3vh; margin-left: 10vh; margin-top: 1vh;">
        </div>
        <?php
            $category_id = isset($_GET['category']) ? $_GET['category'] : 0;

            $categorias = Category::listar();
            foreach ($categorias as $category) {
                $isSelected = $category->getId() == $category_id ? 'flaranja' : '';
                $textColor = $isSelected ? 'laranja-text' : 'preto-text';
                echo "<div class='col-1'>
                        <a href='index.php?category={$category->getId()}' class='laranja-hover flaranja {$textColor}' style='border: 0px;background-color: black;' name='category' value='{$category->getId()}'><h3>{$category->getName()}</h3></a>
                    </div>";
            }
        ?>
    </div>
    <hr><br>

    <div class="row">
        <?php
        $estabelecimento_id = isset($_GET['establishment_id']) ? $_GET['establishment_id'] : 0;
        $category = isset($_GET['category']) ? $_GET['category'] : 0;
        $categorias = Category::listar(3, $estabelecimento_id);
        if ($category == 0) {
            foreach ($categorias as $categoria) {
                echo "<h3>" . $categoria->getName() . "</h3>";
            }
        } else {
            $categoriasAA = Category::listar(1, $category);
            echo "<h3 style='margin-left:7vh;'>" . $categoriasAA->getName() . "</h3>";
            echo "<div class='container'>";
            listarProduto($category);
            echo "</div>";
        }
        ?>
    </div>

    <?php
    function listarProduto($idCategory)
    {
        $proCategory = Product::listar(3, $idCategory);
        echo "
            <style>
                .brancoA {
                    background-color: white;
                    height: 100%;
                    box-shadow: 2px 0px 15px rgba(0, 0, 0, 0.3); 
                }
            </style>
        ";
        echo "<div class='row'>";
        foreach ($proCategory as $produto) {
            echo "<div class='container col-5 brancoA' style='margin-top: 4vh;'>";
            echo "<div class='row' style='margin-top: 2.5vh;'>";
            echo "<div class='col-4'>";
            echo "<img src='../../assets/img/" . $produto->getImg() . "' alt='img' style='width: 80%; height: 10vh; margin-left: 0vh; margin-top: 0vh;'>";
            echo "</div>";
            echo "<div class='col-7'>";
            echo "<h4><b>" . $produto->getName() . "</b></h4>";
            echo $produto->getDescription() . "<br>";
            echo "<h5><b>R$" . $produto->getPrice() . ",00</b></ h5>";
            // echo "<img src='../../assets/img/add.php' alt='img'> <br> <br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }



    ?>
</body>

</html>
