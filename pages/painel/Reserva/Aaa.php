<?php 
                                $novo = 1;
                                if ($novo == 1) {
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
                            <div class="textInput">
                                <label for="" class="corText"><b>Nome do Estabelecimento</b></label>
                                    <br>
                                <input type="text" class="inputTextA" style="color:black;" name="" id="" placeholder="">
                                <hr class="linhaInputA" style="height: 2px;">                            
                            </div>  