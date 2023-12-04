<?php 
    $path = '../conf/conf.inc.php';
    if (file_exists($path))
    include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
    include_once($path);  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EAT DRINK - PAINEL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
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
        <style>
            body{
                background-color: #FFFFFF;
            }
            .txtA{
                font-family: 'Open Sans', sans-serif;
                font-size: clamp(20px,9vw,5px);
            }
            .fLaranja{
                background-color: #F67B30;
                height: 91vh;
                color: white;
                
            }
            .fBranco{
                background-color: white;
                color: black;
                margin-top: 2%;
                border-color: white;
                width: 100%;
                float: left;
                border-bottom: 0px;
            }

            .fBrancoB{
                background-color: white;
                color: black;
                margin-top: 1%;
            }
            .icon{
                float: left;
                width: 10%;
            }
            .iconA{
                float: center;
                width: 10%;
            }
            .center{
                float: center;
                text-align: center;
                position: center;
                /* background-color: white; */
                color: black;
                margin-top: 2%;
                border-color: white;
                width: 100%;
                border-bottom: 0px;
                font-weight: bold;
            }
            .label1{
                margin-right: 6vw;
                font-weight: bold;
            }
            .label2{
                margin-right: 3.5vw;
                font-weight: bold;
            }
            .label3{
                margin-right: 7vw;
                font-weight: bold;
            }
            .label4{
                margin-right: 4vw;
                font-weight: bold;
            }
            .body1{
                margin-top: 2vh;
                margin-left: 2vh;
                margin-right: 2vh;
                background-color: #A6A6A6;

                border-radius: 25px;
                line-height: 30px;
                padding: 0.7vh 20px;
                height: 25vh;
                width: 159vh;
            }
            
            .body1a{
                margin-top: 1vh;
                margin-left: 0vh;
                margin-right: 0vh;
                background-color: #D9D9D9;

                border-radius: 25px;
                line-height: 30px;
                padding: 0.7vh 20px;
                height: 40vh;
                width: 150vh;
            }
            .body2{
                margin-top: -5vh;
                margin-left: 2vh;
                margin-right: 2vh;
                background-color: #F6F5F5;

                border-radius: 25px;
                line-height: 30px;
                padding: 0.7vh 20px;
                width: 159vh;

                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
            }
            .body2a{
                margin-top: -30vh;
                margin-left: 1vh;
                margin-right: 0vh;
                background-color: white;

                border-radius: 25px;
                line-height: 30px;
                padding: 0.7vh 20px;
                height: 40vh;
                width: 148vh;

                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
            }
            .body3{
                margin-left: 9vh;
                margin-right: 2vh;
                background-color: DimGray;

                border-radius: 25px;
                line-height: 30px;
                padding: 0.7vh 20px;
                height: 13vh;
                width: 13vh;
            }
            .textInput{
                margin-top: -6vh;
                margin-left: 25vh;
                /* margin-right: 2vh; */
            }
            .inputTextA{
                background-color: #F6F5F5;
                /* border-radius: 25px; */
                line-height: 30px;
                /* padding: 0.7vh 20px; */
                /* text-transform: uppercase; */
                font-weight: bold;
                color:black;
                border: 0px solid #F67300;
            }
            
            .linhaInputA{
                margin-top: -0vh;
                height: 2px;
                width: 30vh;
            }
            .txtA{
                font-family: 'Open Sans', sans-serif;
                font-size: clamp(20px,9vw,5px);
                color: #F67B30;
            }
            .a{
                margin-top: 30vh;
            }
            .txxt{
                color: black;
            }
            .img1{
                width: 3vh;
                margin-left: -35vh;
                margin-top: -6vh;
            }
            .img2{
                width: 3vh;
                margin-left: 32vh;
                margin-top: -11vh;
            }
            .imga1{
                width: 5vh;
                margin-left: -25vh;
                margin-top: 0vh;
            }
            .timga{
                width: 50vh;
                margin-left: 3vh;
                margin-top: -5vh;
            }
            .timga1{
                /* width: 50vh;
                margin-left: 15vh;
                margin-top: 2vh; */
            }
            .timga2{
                /* width: 50vh;
                margin-left: 12vh;
                margin-top: -5vh; */
            }
            .sombra {
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
            }
            .corText{
                color: #A6A6A6;
            }
            .btnAddCategoria{
                width: 25vh;
                margin-left: 5vh;
                margin-top: 15vh;

                border-radius: 5px;
                line-height: 20px;
                padding: 0.6vh 10px;
            }
            label {
                cursor: pointer;
            }
            .fotoCategoria{
                width: 100vh;
                margin-left: 0vh;
                margin-top: 0vh;
            }
            .espacoA{
                margin-top: 1vh;
            }
            .logo{
                width:30vh;
            }
            .mobile{
                display:none;
            }
            .logoA{
                    display: flex;
                    width:22vh;
                }
            @media (max-width: 980px) {
                /* Dispositivos Móveis */
                .mobile{
                    display:block;
                }
                .logoA{
                    display: none;
                   
                }
                .sombra {
                    width:100vh;
                    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
                }
                .fLaranja{
                    display: none;               
                }
                .body1{
                    margin-top: 12vh;
                    margin-left: 2vh;
                    margin-right: 2vh;
                    background-color: #A6A6A6;

                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    height: 25vh;
                    width: 140%;
                }
                
                .body1a{
                    margin-top: 1vh;
                    margin-left: 0vh;
                    margin-right: 0vh;
                    background-color: #D9D9D9;

                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    height: 40vh;
                    width: 150vh;
                }
                .body2{
                    margin-top: -5vh;
                    margin-left: 2vh;
                    margin-right: 2vh;
                    background-color: #F6F5F5;

                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    width: 140%;

                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
                    border-bottom-left-radius: 15px;
                    border-bottom-right-radius: 15px;
                }
                .body2a{
                    margin-top: -30vh;
                    margin-left: 1vh;
                    margin-right: 0vh;
                    background-color: white;

                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    height: 40vh;
                    width: 148vh;

                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
                    border-bottom-left-radius: 15px;
                    border-bottom-right-radius: 15px;
                }
                .body3{
                    margin-left: 6vh;
                    margin-right: 2vh;
                    background-color: DimGray;

                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    height: 10vh;
                    width: 10vh;
                }
                .fBrancoB{
                    background-color: white;
                    color: black;
                    margin-top: 1%;
                    height: 100%;
                    width: 70%;
                }
                .fBranco{
                    background-color: white;
                    color: black;
                    margin: 1vh;
                    border-color: white;

                    width: 100%;
                    height: 5vh;

                    float: left;
                    border-bottom: 0px;

                    box-shadow: none;
                }
                .txtMenu{
                    margin: 1vw;
                    font-weight: bold;
                    font-size: 10px;
                }
                .icon{
                    /* display:none; */
                    margin: 0.5vh;
                    background-color: white; 
                    width: 100%;
                    height: 10vh;
                }
                .iconA{
                    /* display:none; */
                    color: black;
                }
                .label1{
                    font-size: 10px;
                    margin: 1vw;
                    font-weight: bold;
                }
                .label2{
                    font-size: 10px;
                    margin-right: 3vw;
                    font-weight: bold;
                }
                .label3{
                    font-size: 10px;
                    font-size: 10px;
                    margin-right: 7vw;
                    font-weight: bold;
                }
                .label4{
                    font-size: 10px;
                    margin-right: 4vw;
                    font-weight: bold;
                }
                #navbarSupportedContent {
                    display: none;                    
                }

                .vertical-menu {
                    display: none;
                    margin-top: 10px;
                    width:100%;
                }

                .vertical-menu.show {
                    display: flex;
                }
                .Cor{
                    background-color: #F67B30;
                }
                .meumenu{
                    background-color: #F67B30; 
                    color:black;
                    display:none;
                    width:100%;
                }
                .meumenu > li {
                    display:block;
                    width:100%;
                }
            }
        </style>
    </head>
    <body>
    <div class="row">
        <div class="row sombra logoA">
            <div class="col-12">
                <a class="navbar-brand" href="..index.php'?>"><img src="../../assets/img/logoeatdrink.png" alt="logo" class="logo"></a>
            </div>
        </div>
        <div class="row">
            <div class="mobile">
                <div class="col-12">                
                    <nav class="navbar navbar-expand-md bg-light bg-body-tertiary bg-body-tertiary fixed-top Cor" style="box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3); background-color: white; widht:100%">
                        <a class="navbar-brand" href="#">
                            <img src="../../assets/img/logoeatdrink.png" style="width:20vh; margin:1vh;" alt="logo" class="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuapp" aria-controls="#menuapp" aria-expanded="false" aria-label="Toggle navigation"></button>
                        <ul class="nav vertical-menu meumenu" id="menuapp"> 
                            <li class="nav-item active">
                                <a class="nav-link icon" href="#"><img src="../../assets/img/time.png" alt="logo" ><label class="iconA">Pedido do Dia</label></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon" href="#"><img src="../../assets/img/spatula.png" alt="logo"><label class="iconA">Pedidos na Cozinha</label></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon" href="#"><img src="../../assets/img/time.png" alt="logo"><label class="iconA">Inventario</label></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon" href="#">Página 3</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-2 fLaranja">
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
                    <a href="pages/login/acao.php?acao=logoff">Desconectar</a>
            </div>
            <div class="col-10 fBrancoB">
            <div class="body1"></div>
                <div class="body2">
                    <?php 
                        $novo = 1;
                        if ($novo == 0) {
                            echo"<style> .body3{margin-top: -30vh;}</style>";
                            echo "<form action='acao.php' method='post'>
                                    <button class='btnAddCategoria' name='categoria' value='criar'><b>Adicione uma categoria</b></button>
                                </form>";
                        }else{ 
                                echo "<br><br><br><br>";
                            echo"<style> .body3{margin-top: -73vh;}</style>";
                            echo "<div class='body1a'>
                                    <input style='margin-top: 1vh;margin-bottom: 0vh;' type='text' name='NomeCategoria' id='NomeCategoria' placeholder='Ex. Pizza'>
                                    <p style='margin-top: -6.4vh;margin-bottom: -1vh;margin-left: 1vh;'><b>Nome da Categoria</b></p>
                                </div>
                                <div class='body2a'>
                                    <div class='row'>
                                        <div class='col-2'>
                                            <form method='post' action='acao.php' enctype='multipart/form-data'>
                                                <label for='profile_pic'>
                                                    <img src='../../assets/img/Upload.png' class='img1 fotoCategoria' alt='Selecione uma imagem' style='width: 100px; height: 100px;''>
                                                </label>
                                                <input id='profile_pic' type='file' name='profile_pic' accept='image/*' style='display: none;'>
                                            </form>
                                        </div>
                                        <div class='col-9 espacoA'>
                                            <input type='text' placeholder='Ex. Pizza' class='form-control' name='' id=''>
                                                <br>
                                            <textarea name='' placeholder='Descrição...' class='form-control' id='' cols='5' rows='3'></textarea>
                                                <br>
                                            <div class='row'>
                                                <div class='col-4'>
                                                    <input placeholder='R$ 0,00' class='form-control' type='number' name='' id=''>
                                                </div>
                                                <div class='col-4'>
                                                    <input placeholder='R$ 0,00' class='form-control' type='number' name='' id=''>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-1'>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class='body3a'>
                                </div>";
                        }
                    ?>                  
                
                </div>
                <div class="body3"></div>

                <div class="textInput">
                    <label for="" class="corText"><b>Nome do Estabelecimento</b></label>
                        <br>
                    <input type="text" class="inputTextA" style="color:black;" name="" id="" placeholder="">
                    <hr class="linhaInputA" style="height: 2px;">
                        
                </div>
            </div>
        </div>
        
    </div>
            
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="Aviso">
                    <center>
                    <div class="a" style="background-color:white;width: 70vh; height:45vh;border: 2px solid #D9D9D9;">
                            <br><br><br>
                    <div>
                        <img src="../../assets/img/b.png" class="img1" alt="">
                    </div>
                    <div>
                        <img src="../../assets/img/ab.png" class="img2" alt="">
                    </div>
                        <hr style="width: 30.6vh; margin-top:-6.5vh; margin-left:-1.5vh;">
                    <div class="card-body">
                        <h5 class="card-title txt" ><b>Olá! Boas vindas a</b></h5>
                        <h6 class="card-subtitle mb-2 txtA" style="color: #F67B30" ><b>Eat Drink</b></h6>
                        <p class="card-text">Aqui você vai poder</p>

                        <div class="row imga1">
                            <img src="../../assets/img/categoria.png" alt="logo" width="1vh" class="">
                                
                            <img src="../../assets/img/config.png" alt="logo" width="1vh" class="">
                        </div>
                        <div class="row timga">
                            <b class="timga2">Configurar o seu negócio</b>
                            <b class="timga1" style="margin-left: -1.5vh;">Crie seu menu digital</b>
                        </div>
                            <br><br>
                        <button id='acao' class='btn fLaranja' type="button" class="close" data-dismiss="modal">Avançar</button>
                    </div>
                    </div>
                    </center>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="Aviso">
                    <center>
                    <div class="a" style="background-color:white;width: 70vh; height:45vh;border: 2px solid #D9D9D9;">
                            <br><br><br>
                        
                    <div>
                        <img src="../../assets/img/1b.png" class="img1" alt="">
                    </div>
                    <div>
                        <img src="../../assets/img/2a.png" class="img2" alt="">
                    </div>
                        <hr style="width: 30.6vh; margin-top:-6.5vh; margin-left:-1.5vh;">
                    <div class="card-body">
                        <h5 class="card-title txt" ><b>O primeiro passo é criar o seu menu</b></h5>
                                <br>
                            <img src="../../assets/img/celular.png" alt="logo" width="200vh" class="">

                            <br><br>
                        <button id='acao' class='btn fLaranja' type="button" class="close" data-dismiss="modal">Avançar</button>
                    </div>
                    </div>
                    </center>
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
        </script>
    </body> 
</html>