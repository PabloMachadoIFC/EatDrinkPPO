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

    define ('EMAIL', $_SESSION['email']);
    define ('USERid', $_SESSION['id']);

    $idUser = $_SESSION['id'];
    

    $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : '';
    switch ($aviso) {
        case 'ExcluidoP':
            echo '<script>
                setTimeout(function() {
                    alert("Produto excluído com sucesso!");
                }, 100); // Delay the alert to ensure it shows after the page reloads
              </script>';
            break;
        case 'EditadoP':
            echo '<script>
                setTimeout(function() {
                    alert("Produto editado com sucesso!");
                }, 100); // Delay the alert to ensure it shows after the page reloads
                </script>';
            break;
        case 'CadastradoP':
            echo '<script>
                setTimeout(function() {
                    alert("Produto criado com sucesso!");
                }, 100); // Delay the alert to ensure it shows after the page reloads
                </script>';
            break;
        case 'ExcluidoC':
            echo '<script>
                setTimeout(function() {
                    alert("Categoria excluído com sucesso!");
                }, 100); // Delay the alert to ensure it shows after the page reloads
                </script>';
            break;
        case 'EditadoC':
            echo '<script>
                setTimeout(function() {
                    alert("Categoria editado com sucesso!");
                }, 100); // Delay the alert to ensure it shows after the page reloads
                </script>';
            break;
        case 'CadastradoC':
            echo '<script>
                setTimeout(function() {
                    alert("Categoria criado com sucesso!");
                }, 100); // Delay the alert to ensure it shows after the page reloads
                </script>';
            break;
        default:
            # code...
            break;
    }

    if ($_SESSION['email'] == null) {
        header("Location: ../login/acao.php?acao=logoff");
        exit(); 
    }
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
        <link rel="stylesheet" href="../../assets/css/index.css">
        <style>
            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                z-index: 1;
                border: 1px solid #ddd;
                border-radius: 5px;
                overflow: hidden;
                transition: all 0.3s ease;
                margin-top: 8px;
                width: 200px; 
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown-content button {
                width: 100%;
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid #ddd;
                transition: background-color 0.3s ease;
            }

            .dropdown-content button:last-child {
                border-bottom: none;
            }

            .dropdown-content button:hover {
                background-color: #f5f5f5;
            }

            .logo img {
                width: 50px; 
                height: auto;
                margin-right: 10px;
                border-radius: 50%;
            }

            .label1, .label2, .label3, .label4 {
                color: #F67B30;
            }
        </style>
    </head>
    <body style="container">
        <div class="row">        
            <div class="logoA">
                <div class="col-12 sombra dropdown">
                    <a class="navbar-brand" href="">
                        <img src="../../assets/img/logoeatdrink.png" alt="logo" class="logo">
                        <div class="dropdown-content">
                        <!-- <a disabled><img src="../../assets/img/bloqueio.png" style="width:3vh"><label class="label1">Administrador</label></a>
                        <a disabled><img src="../../assets/img/bloqueio.png" style="width:3vh"><label class="label2">Caixa</label></a>
                        <a disabled><img src="../../assets/img/bloqueio.png" style="width:3vh"><label class="label3">Cozinha</label></a> -->
                        <a type="button" href="../login/acao.php?acao=logoff"><img src="../../assets/img/sair.png" style="width:3vh"><label class="label3">Sair</label></a>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row" style="margin-top:2vh;">
            <div class="body1" style="widht: 100%;">
                <script>
                    function changeBackgroundColor() {
                        var colorInput = document.getElementById("colorInput");
                        var body1 = document.getElementsByClassName("body1")[0];
                        body1.style.backgroundColor = colorInput.value;
                    }
                </script>
                <?php
                    $estabelecimento = Establishment::listar(4, $idUser);

                    if ($estabelecimento) {
                        $nomeEmpresa = $estabelecimento[0]['name'];
                        $_SESSION['EstabelecimentoID'] = $estabelecimento[0]['id'];
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
                    <br>
                    <div class='row'>
                        <?php
                                echo "<br><br>
                            <a href='index.php?acao=createCategory' class='btn btnAddCategoria' type='button'>Categorias</button>
                            <a href='index.php?acao=createProduct' class='btn btnAddProduto' type='button' style='margin-left: 2vh; margin-top: 0vh;' >Produtos</a>
                            <a href='../cardapio/index.php?' class='btn btnAddProduto' type='button' style='margin-left: 2vh; margin-top: 0vh;' >Cardapio</a>
                                <br><br><br>  ";            

                            $acao = isset($_GET['acao']) ? $_GET['acao'] : '';                                                                       
                            if($acao == 'createCategory'){
                                echo"<div class=''style='margin-left: 0vh; margin-top: 2vh; width: 100%; height: 100%;'> ";
                                include('indexCategory.php');
                            }elseif($acao == 'createProduct'){
                                echo"<div class=''style='margin-left: 0vh; margin-top: 2vh; width: 100%; height: 100%;'> ";
                                include('indexProduto.php');
                            }
                            echo"</div>";
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