<?php
    require_once('../../conf/conf.inc.php');
    require_once('../classes/autoload.php');

    $categoria = new Categoria(6, 'example', 1);

    $qeditando = null;


    $id = isset($_GET['id'])?$_GET['id']:0;
    if ($id > 0){
        $dados = $categoria->listar(1,$id);
        $qeditando = new Categoria($dados[0]['id'],$dados[0]['nome'],$dados[0]['idEstabelecimento']);
    }    

    echo "<style>
        .btnA {
            background-color: white; /* Color de fondo del botón (blanco) */
            color: black; /* Color del texto del botón (negro) */
            border: 1px solid black; /* Borde negro de 1 píxel */
            padding: 2px 20px; /* Espaciado interno del botón */
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            border-radius: 10%; /* Hace que el botón tenga esquinas redondeadas */

        }
    </style>";

    $lista = $categoria->listar();
    foreach ($lista as $item) {
    $q = new Categoria($item['id'], $item['nome'], $item['idEstabelecimento']);
    if ($q == NULL) {
        echo "<form action='acao.php' method='post'>
                <button class='btnAddCategoria' name='categoria' value='criar' style='margin-top:2vh;margin-left:9vh;'><b>Adicione uma categoria</b></button>
            </form>";
    }else{ 
        echo "<div class='body1a'>
                <input style='margin-top: 3vh;margin-bottom: 0vh;' type='text' name='NomeCategoria' id='NomeCategoria' placeholder='Ex. Pizza' value='". $q->getNome() ."'>
                <p style='margin-top: -6.4vh;margin-bottom: -1vh;margin-left: 1vh;'><b>Nome da Categoria</b></p>
            </div>
            <div class='body2a'>
                <div class='row'>
                    <div class='col-2'>
                        <form method='post' action='acao.php' enctype='multipart/form-data'>
                            <label for='categoria_pic'>
                                <img src='../../assets/img/Upload.png' class='img1 fotoCategoriaB' alt='Selecione uma imagem' style='width: 100px; height: 100px;''>
                            </label>
                            <input id='categoria_pic' type='file' name='categoria_pic' accept='image/*' style='display: none;'>
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
            </div>";
            $produtoA = 2;
                if($produtoA == 1){
                echo "<div class='body3a'>            
                        <div class='b3b'>
                            <button class='btnA'>+ Adicione Produto</button>
                        </div>
                    </div>";
            }else{
                
            }
        }
    }
?>                            