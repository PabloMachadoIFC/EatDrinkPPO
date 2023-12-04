<?php
    session_start();
    require_once('../classes/autoload.php');

    $path = '../conf/conf.inc.php';
    if (file_exists($path))
    include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
    include_once($path);  


    echo "<br> POST: ";
    var_dump($_POST);
    echo "<br> GET: ";
    var_dump($_GET);
    echo "<br> SESSION: ";
    var_dump($_SESSION);
    echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EAT DRINK - PAINEL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../assets/css/index.css">

        <?php
            $teste = 0;

            if ($teste == 1) {
                echo "
                    <script>
                        $(document).ready(function(){
                            $('#myModal').modal('show');
                        });
                    </script>
                    
                ";
                $teste = 2;
            }
            elseif($teste == 2) {
                echo "
                    <script>
                        $(document).ready(function(){
                            $('#myModal2').modal('show');
                        });
                    </script>
                ";
            }
            


        ?>
    </head>
    <body style="box-sizing: border-box;">
        <div class="row">        
            <div class="logoA">
                <div class="col-12 sombra">
                    <a class="navbar-brand" href="..index.php'?>"><img src="../../assets/img/logoeatdrink.png" alt="logo" class="logo"></a>
                </div>
            </div>
        </div>
        <div class="row">          
            <div class="col-2 fLaranja" style="height: 90.9vh;">
                <button style="box-shadow: none;" class="fBranco"><img src="../../assets/img/time.png" alt="logo"  class="icon"><label class="label1">Pedido do Dia</label></button>

                <button class="fBranco"><img src="../../assets/img/spatula.png" alt="logo" class="icon"><label class="label2">Pedidos na Cozinha</label></button>
                
                <br><br>

                <h5 class="txtA" style="color: black;">Analisar</h5>
                <button class="fBranco"><img src="../../assets/img/time.png" alt="logo" class="icon"> <label class="label3">Inventario</label></button>

                <br><br>

                <h5 class="txtA" style="color: black;">Configuração</h5>
                <button class="fBranco"><img src="../../assets/img/tablet.png" alt="logo" class="icon"> <label class="label4">Meu menu digital</label></button>

                    <br><br><br><br><br>
                
                <button class="center"><img src="../../assets/img/eye.png" alt="logo" class="iconA"> <label class="">Ver meu menu</label></button>
                    <br><br><br><br><br>
                <a href="../login/acao.php?acao=logoff">Desconectar</a>
            </div>
            <div class="col-10 fBrancoB" style="margin-top:2vh;">
                <div class="body1" style="widht: 100%;">
                    <script>
                        function changeBackgroundColor() {
                            var colorInput = document.getElementById("colorInput");
                            var body1 = document.getElementsByClassName("body1")[0];
                            body1.style.backgroundColor = colorInput.value;
                        }
                    </script>
                    <?php
                        $idUser = $_SESSION['id'];
                        $estabelecimento = Establishment::listar(4, $idUser);

                        if ($estabelecimento) {
                            $nomeEmpresa = $estabelecimento[0]['name'];
                        } else {
                            $nomeEmpresa = "Estabelecimento não encontrado";
                        }
                    ?>
                    <div class="body2">                
                        <div class="body3">
                            <a type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasEdit' aria-controls='offcanvasTop'><img src='../../assets/img/iconEdit.png' class='iconEdit' alt='Selecione uma imagem'></a>
                            
                            <div class='offcanvas offcanvas-top' style='margin-top: 35vh; margin-left: 60vh;height: 50vh;width: 90vh;border-radius: 10px;' tabindex='-1' id='offcanvasEdit' aria-labelledby='offcanvasTopLabel'>
                                <div class='offcanvas-body'>
                                    <div class='row'>                                    
                                        <form action='acao.php' method='post'>                                        
                                            <center>
                                                <br>
                                                <h3>Alterar Informações:</h3>
                                                    <br>
                                                <fieldset class='custom-fieldset'>
                                                    <legend id='custom-legend'>Nome da Empresa*</legend>
                                                    <input type='text' placeholder='Ex.: EatDrink' class='form-control offInput' value="<?php echo $nomeEmpresa; ?>" name='name' id=''>
                                                </fieldset>
                                                    <br>

                                            <div class='row'>  
                                                <div class='col-6'>   
                                                    <fieldset class='custom-fieldsetFoto'>
                                                        <legend id='custom-legendFoto'>Foto de perfil*</legend>
                                                        <label for='img'>
                                                            <img src='../../assets/img/Upload.png' class='img1 fotoCategoria' alt='Selecione uma imagem' style='width: 130px; height: 130px; margin-left:-2.3vh;margin-top:-1vh;'>
                                                        </label>
                                                    </fieldset>
                                                    <input id='img' type='file' name='img' accept='image/*' style='display: none;'>
                                                </div>
                                                <div class='col-6'>   
                                                    <fieldset class='custom-fieldsetCor'>
                                                        <legend id='custom-legendCor'>Cor da capa*</legend>
                                                            <input type="color" class='inputCor' id="colorInput" onchange="changeBackgroundColor()" style="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                                    <br>
                                                <input type='button' class='btn bCinza' data-bs-dismiss='offcanvas' aria-label='Close' value='Cancelar'>
                                                <button type='submit' class='btn bLaranja' data-bs-dismiss='offcanvas' name='acao' value='editEstablishment'>Salvar</button>
                                            </center>                                        
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <img src='../../assets/img/Upload.png' class='img1 fotoCategoria' alt='Selecione uma imagem' style='width: 130px; height: 130px; margin-left:-2.3vh;margin-top:-1vh;'>
                                
                        </div> 
                        
                        <div class="textInput">
                            <label for="" class="corText"><b>Nome do Estabelecimento</b></label>
                                <br>                               

                            <input type="text" class="inputTextA" style="color: black;" name="" id="" placeholder="Nome da Empresa" value="<?php echo $nomeEmpresa; ?>" readonly>

                            <hr class="linhaInputA" style="height: 2px;">        
                                            
                        </div>
                        <?php
                            echo "<br><br>
                            <button class='btn btnAddCategoria' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop'>+ Criar uma Categoria</button>
                            <a href='acao.php' class='btn btnAddProduto' style='margin-left: 2vh; margin-top: 0vh;' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasProduto' aria-controls='offcanvasProduto'>+ Criar um Produto</a>
                            <br><br>  ";

                            $idCategory = isset($_GET['idCategory']) ? $_GET['idCategory'] : '';
                            $lista = Category::listar();
                            foreach ($lista as $item) {                                                                           
                                echo "
                                        <div class='body1a'>
                                            <input style='margin-top: 2vh;margin-bottom: 0vh;' type='text' name='NomeCategoria' id='NomeCategoria' placeholder='Ex. Pizza' value='". $item->getName() ."'>
                                            <p style='margin-top: -6.4vh;margin-bottom: -1vh;margin-left: 1vh;'><b>Nome da Categoria</b></p>
                                            <a class='iconEditA' href='acao.php?idCategory=". $item->getId()."' class='btn btnAddProduto' data-bs-toggle='offcanvas' data-bs-target='#adicionarProdutoModal'><img src='../../assets/img/iconEdit.png' class='iconEditA' alt='Selecione uma imagem'></a>
                                            <a class='iconTrashA' href='acao.php?acao=deleteCategory&id=". $item->getId()."'><img src='../../assets/img/iconTrash.png' class='iconTrash' alt='Selecione uma imagem'></a>
                                        </div>
  
                                        <style>
                                            .body2a{
                                                margin-top: -30vh;
                                                margin-left: 0.5vh;
                                                margin-right: 0vh;
                                                background-color: white;
                                
                                                border-radius: 25px;
                                                line-height: 30px;
                                                padding: 0.7vh 20px;
                                                height: 40vh;
                                                width: 155vh;
                                
                                                border-top-left-radius: 0;
                                                border-top-right-radius: 0;
                                                border-bottom-left-radius: 15px;
                                                border-bottom-right-radius: 15px;
                                            }
                                            .offcanvas-top{
                                                height: 30vh;
                                                width: 80vh;
                                                margin-top: 40vh;
                                                margin-left: 76vh;
                                
                                                border-radius: 10px;
                                
                                            }
                                        </style>
                                    ";
                                    echo "
                                        <div class='body2a' style='height: 100%;'>                                         
                                            <div class='row'>
                                                <div class='col-2'>
                                                ";
                                                $produtoss = ProductCategory::listar(2, $item->getId());
                                                if (!empty($produtoss)) {
                                                    echo "<table>";
                                                    echo "<tr>";
                                                    echo "<th>ID</th>";
                                                    echo "<th>Nome</th>";
                                                    echo "</tr>";
                                                    
                                                    foreach ($produtoss as $produto) {
                                                        echo "<tr>";
                                                        echo "<td>{$produto['product_id']}</td>";
                                                        $infos = Product::listar(1, $produto['product_id']);
                                                        foreach($infos as $info){
                                                        echo "<td>{$info['name']}</td>";
                                                        }
                                                        echo "</tr>";
                                                    }                                                    
                                                    echo "</table>";
                                                }
                                                echo "
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                
                                    echo "
                                        <style>
                                            .body1a{
                                                margin-top: 1vh;
                                                margin-left: 0vh;
                                                margin-right: 0vh;
                                                background-color: #D9D9D9;
                                
                                                
                                                line-height: 30px;
                                                padding: 0.7vh 20px;
                                                height: 13vh;
                                                width: 156.5vh;

                                                border-radius: 25px;
                                                border-bottom-left-radius: 0; 
                                                border-bottom-right-radius: 0;
                                            }
                                            .body2a{
                                                margin-top: -5.2vh;
                                                margin-left: 0.3vh;
                                                margin-right: 0vh;
                                                background-color: white;
                                                height: 5vh;
                                                width: 155.5vh;
          
                                            }
                                            .offcanvas-top{
                                                height: 30vh;
                                                width: 80vh;
                                                margin-top: 40vh;
                                                margin-left: 76vh;
                                
                                                border-radius: 10px;
                                
                                            }
                                            .offInput{
                                                margin-top: 0vh;
                                                margin-left: 0vh;
                                                height: 3vh;
                                                width: 63vh;
                                                border: 0px solid #F67300;
                                                border-bottom-left-radius: 0; 
                                                border-bottom-right-radius: 0;

                                                border-radius: 7px;
                                            }      
                                            .custom-fieldset {
                                                border: 2px solid #ccc;
                                                // padding: 20px;
                                                height: 3.5vh;
                                                width: 63.5vh;
                                                position: relative;
                                                margin-top: 10px;

                                                border-radius: 7px;
                                            }
                                                                                    
                                            #custom-legend {
                                                font-size: 1.5vh;
                                                position: absolute;
                                                width: 14vh;
                                                margin-left: 1vh;
                                                top: -20px;
                                                background-color: #fff;
                                                padding: 0 5px;

                                                border-radius: 7px;
                                            }  
                                            
                                            .offInputA{
                                                margin-top: 0vh;
                                                margin-left: 0vh;
                                                height: 3vh;
                                                width: 30vh;
                                                border: 0px solid #F67300;
                                                border-bottom-left-radius: 0; 
                                                border-bottom-right-radius: 0;

                                                border-radius: 7px;
                                            }      

                                            .custom-fieldsetA{
                                                border: 2px solid #ccc;
                                                // padding: 20px;
                                                height: 3.5vh;
                                                width: 30.5vh;
                                                position: relative;
                                                margin-top: 1vh;

                                                border-radius: 7px;
                                            }
                                                                                    
                                            #custom-legendA{
                                                font-size: 1.5vh;
                                                position: absolute;
                                                width: 15vh;
                                                margin-left: 1vh;
                                                top: -20px;
                                                background-color: #fff;
                                                padding: 0 5px;

                                                border-radius: 7px;
                                            }  

                                            .offInputB{
                                                margin-top: 0vh;
                                                margin-left: 0vh;
                                                height: 3vh;
                                                width: 30vh;
                                                border: 0px solid #F67300;
                                                border-bottom-left-radius: 0; 
                                                border-bottom-right-radius: 0;

                                                border-radius: 7px;
                                            }      
                                            .custom-fieldsetB{
                                                border: 2px solid #ccc;
                                                // padding: 20px;
                                                height: 9.3vh;
                                                width: 63.5vh;
                                                position: relative;
                                                margin-top: 10px;

                                                border-radius: 7px;
                                            }
                                                                                    
                                            #custom-legendB{
                                                font-size: 1.5vh;
                                                position: absolute;
                                                width: 8vh;
                                                margin-left: 1vh;
                                                top: -20px;
                                                background-color: #fff;
                                                padding: 0 5px;

                                                border-radius: 7px;
                                            }  
                                        </style>
                                    ";
                                    echo "
                                    <div class='body2a'>
                                    "
                                    //<a href='acao.php?idCategory=". $item->getId()."' class='btn btnAddProduto' style='margin-left: 2vh; margin-top: 0.7vh;' type='button' data-bs-toggle='offcanvas' data-bs-target='#adicionarProdutoModal' aria-controls='offcanvasProduto'>+ Adicionar um Produto</a>
                                    ."
                                    </div>
                                    ";
                                    
                                    echo"
                                        <div class='offcanvas offcanvas-top' style='margin-top: 10vh; margin-left: 60vh;height: 70vh;width: 90vh;border-radius: 10px;' tabindex='-1' id='adicionarProdutoModal' aria-labelledby='offcanvasTopLabel'>
                                            <div class='offcanvas-body'>
                                                <form action='acao.php' method='post'>   
                                                    <input type='hidden' name='categoria_id' value=". $item->getId()."'>                                     
                                                    <center>
                                                        <br>
                                                        <h3>Adicione os produtos a sua categoria:</h3>
                                                        <br>
                                                    ";
                                                    $produtos = Product::listar();
                                                    $produtosPorLinha = 3;
                                                    $contador = 0;

                                                    foreach ($produtos as $produto) {
                                                        if ($contador % $produtosPorLinha === 0) {
                                                            echo "<div class='row'>";
                                                        }

                                                        echo "<div class='col-md-4'>";
                                                        echo "<input type='checkbox' name='produtos[]' value='{$produto['id']}'> {$produto['name']}<br>";
                                                        echo "</div>";

                                                        if (($contador + 1) % $produtosPorLinha === 0 || ($contador + 1) === count($produtos)) {
                                                            echo "</div>";
                                                        }

                                                        $contador++;
                                                    }
                                                    echo "
                                                        <br>
                                                        <input type='button' class='btn bCinza' data-bs-dismiss='offcanvas' aria-label='Close' value='Cancelar'>
                                                        <button type='submit' class='btn bLaranja' data-bs-dismiss='offcanvas' name='acao' value='saveProductCategory'>Salvar</button>
                                                    </center>                                        
                                                </form>
                                            </div>
                                        </div>
                                        ";
                                        
                                    echo "                        
                                        <div class=''>
                                                <br>
                                            ";                                            
                                            echo "<div class='offcanvas offcanvas-top' tabindex='-1' id='offcanvasTop' aria-labelledby='offcanvasTopLabel'>
                                                <div class='offcanvas-body'>
                                                    <form action='acao.php' method='post'>                                        
                                                        <center>
                                                            <br>
                                                            <h3>Adicione o nome da sua categoria:</h3>
                                                                <br>
                                                            <input type='text' class='form-control' name='nome' id='nome' placeholder='Ex: Porções'>
                                                                <br>
                                                            <input type='button' class='btn bCinza' data-bs-dismiss='offcanvas' aria-label='Close' value='Cancelar'>
                                                            <button type='submit' class='btn bLaranja' data-bs-dismiss='offcanvas' name='acao' value='saveCategory'>Salvar</button>
                                                        </center>                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    ";                                
                                    echo "
                                        <div class=''>
                                            <br>
                                            <div class='offcanvas offcanvas-top' style='margin-top: 35vh; margin-left: 60vh;height: 43vh;width: 90vh;border-radius: 10px;' tabindex='-1' id='offcanvasProduto' aria-labelledby='offcanvasTopLabel'>
                                                <div class='offcanvas-body'>
                                                    <form action='acao.php' method='post' id='saveProductForm'>
                                                        <div class=''>
                                                            <div class='row'>
                                                                <br>                                                            
                                                                <center><h3>Adicione o nome do seu produto:</h3></center>
                                                                <div class='col-2 espacoA'>
                                                                    <form method='post' action='acao.php' enctype='multipart/form-data'>
                                                                        <label for='categoria_pic'>
                                                                            <img src='../../assets/img/Upload.png' class='img1 fotoCategoriaB' alt='Selecione uma imagem' style='width: 100px; height: 100px;''>
                                                                        </label>
                                                                        <input id='categoria_pic' type='file' name='img' accept='image/*' style='display: none;'>
                                                                    </form>
                                                                </div>
                                                                
                                                                <div class='col-9 espacoA'>
                                                                    <fieldset class='custom-fieldset'>
                                                                        <legend id='custom-legend'>Nome do produto*</legend>
                                                                        <input type='text' placeholder='Ex.: BATATA RÚSTICA E GORGONZOLA (400g)' class='form-control offInput' name='name' id=''>
                                                                    </fieldset>
                                                                    <br>
                                                                    <fieldset class='custom-fieldsetB'>
                                                                        <legend id='custom-legendB'>Descrição*</legend>
                                                                        <textarea name='description' placeholder='Ex.: Batata rústica com creme de gorgonzola, farofa de bacon, crispy, parmesão e mel. Acompanha maionese verde.' class='form-control' id='' cols='5' rows='3'></textarea>
                                                                    </fieldset>
                                                                    <br>
                                                                    <div class='row'>
                                                                        <div class='col-6'>
                                                                            <fieldset class='custom-fieldsetA'>
                                                                                <legend style='width: 5vh;' id='custom-legendA'>Preço*</legend>
                                                                                <input type='number' placeholder='R$ 0,00' class='form-control offInputA' name='price' id=''>
                                                                            </fieldset>
                                                                        </div>
                                                                        <div class='col-6'>
                                                                            <fieldset class='custom-fieldsetA'>
                                                                                <legend style='width: 20vh;' id='custom-legendA'>Preço c/Desconto (Opcional)</legend>
                                                                                <input type='number' placeholder='R$ 0,00' class='form-control offInputA' name='' id=''>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='col-12' style='margin-top:2vh;'>
                                                                    <center> 
                                                                        <input type='button' class='btn bCinza' data-bs-dismiss='offcanvas' aria-label='Close' value='Cancelar'>
                                                                        <button type='submit' class='btn bLaranja' data-bs-dismiss='offcanvas' name='acao' value='saveProduct'>Salvar</button>
                                                                        <input type='hidden' name='idCategory' value='".$item->getId()."'>
                                                                    </center> 
                                                                </div>                                                            
                                                            </div>
                                                        </div>                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>";
                             
                                                           
                            }
                        ?>
                    </div>                             
                </div>                
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
            $('.navbar-brand').click(function() {
                $('.vertical-menu').toggleClass('show');
            });
            });

            $(document).ready(function() {
            $('#img').change(function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.fotoCategoria').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });});

            $(document).ready(function() {
            $('#categoria_pic').change(function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.fotoCategoriaB').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
        </script>
    </body> 
</html>