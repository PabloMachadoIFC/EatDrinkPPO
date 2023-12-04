<?php
    require_once "../../../conf/Conexao.php";
    require_once "../../classes/autoload.php";
    session_start();
    
    $aviso = isset($_SESSION['aviso']) ? $_SESSION['aviso'] : ""; 
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : ""; 
    $id = isset($_SESSION['id']) ? $_SESSION['id'] : 0; 

    // echo "<br> POST:<br>";
    // var_dump($_POST);
    // echo "<br><br>GET:<br>";
    // var_dump($_GET);
    // echo "<br><br> SESSION:<br>";
    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="icon" type="image/x-icon" href="../../../assets/img/faviconA.png">
        <script src="../../../assets/js/script.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../../../assets/js/script.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
                h1{
                    font-size: clamp(12px,10vw,48px);
                }
                .logo{
                    margin-top: 2.5%;
                    margin-left: 2.5%; 
                }
                .txt{
                    font-family: 'Inter', sans-serif;
                    font-size: clamp(24px,10vw,30px);
                }
                .txtA{
                    font-family: 'Inter', sans-serif;
                    font-size: clamp(24px,10vw,8px);
                }
                .txtBlack{
                    color:black;
                }
                .fLaranja{
                    background-color: #F67B30;
                    color: white;
                    height: 5vh;
                    width: 14vh;
                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    text-transform: uppercase;
                    font-weight: bold;
                }
                .txtO{
                    font-size: clamp(24px,10vw,8px);
                }
                .erro{
                    display: none;
                    color: red;
                }
                @media screen and (max-width:920px){
                .fLaranja {
                    height: 8vh;
                    width: 120px;
                    line-height: 40px;
                    padding: 5px 15px;
                    display: flex; /* Alterar para flex */
                    justify-content: center; /* Centralizar horizontalmente */
                    align-items: center; /* Centralizar verticalmente */
                    text-align: center;
                }
            }
            </style>
    </head>
    <body>
        <div style="margin: 5vh;">
            <div class="row">
                <a href="index.php"><img src="../../../assets/img/logoeatdrink.png" width="200vh"></a>
            </div>            
        <div class='row' style='margin-top:5vh'>
            <?php 
                if($aviso == "c2"){
                    echo "
                        <div class='txtB'>
                            <div class='row'>
                                <div>
                                    <label class='txt'>Vamos cadastrar a sua empresa</label> <br>
                                    <label class='txtO'>Vamos Configurar sua Empresa, leva só 1 minuto</label>
                                </div>
                            </div>
                                <br>
                            <form action='acao.php' method='post'>
                                <input type='hidden' name='codigoUser' id='codigoUser' value='{$id}'>
                                <input type='hidden' name='codigoEst' id='codigoEst' value='' required>
                                <div class='row' style='margin-top:1vh'>
                                    <div class='col-6'>
                                        <label for='nome' class='txtA'>Nome Empresa</label>
                                        <input type='text' name='name' class='form-control' placeholder='Digite o nome' id='nome' value='' required>
                                    </div>
                                    <div class='col-6'>
                                        <label for='cep' class='txtA'>CEP</label>
                                        <input type='text' class='form-control' placeholder='00.000-000' name='zip_code' id='cep' value='' required>
                                    </div>
                                </div>
                                    <br>
                                <div class='row'>
                                    <div class='col-6'>
                                        <label for='cnpj' class='txtA'>Qual o número do CNPJ?</label>
                                        <input type='text' class='form-control' placeholder='XX. XXX. XXX/0001-XX' name='cnpj' id='cnpj' value='' required>
                                    </div>
                                    <div class='col-6'>
                                        <label for='endereco' class='txtA'>Endereço</label>
                                        <input type='text' class='form-control' placeholder='Rua , Bairro , Cidade , Estado' name='address' id='endereco' value='' required>
                                    </div>
                                </div>
                                    <br>
                                <div class='row'>
                                <div class='col-6'>
                                    <label for='telefone' class='txtA'>Telefone de contato</label>
                                    <div class='input-group'>
                                        <span class='input-group-text'>+55</span>
                                        <input type='text' class='form-control' placeholder='(DD) 0000-0000' name='phone' id='telefone' value='' required>
                                    </div>
                                </div>                            
                                    <div class='col-6'>
                                        <label for='estiloCulinaria' class='txtA'>Qual o estilo de culinária?</label>
                                        <select class='form-select' name='culinary_style_id' id='estiloculinaria_codigo'>";
                                     
                                            $styles = Styles::listar();
                                            foreach ($styles as $style) {
                                                echo "<option value='" . $style['id'] . "' selected>" . $style['name'] . "</option>";
                                            } 
                                    
                                        echo "
                                        </select>
                                    </div>
                                </div>
                                    <br><br>
                                <a href='acao.php?acao=logoff' class='txtBlack'><b><-Voltar</b></a>
                                <br><br><br>
                                <button type='submit' id='acao' name='acao' class='btn fLaranja' value='cadDois'>Cadastrar</button>
                            </form> 
                            <script>
                                $(document).ready(function() {
                                    $('#cep').on('keyup', function() {
                                        var cep = $(this).val().replace(/\D/g, '');

                                        if (cep.length === 8) {
                                            $.ajax({
                                                url: '../buscar_endereco.php',
                                                type: 'POST',
                                                data: { cep: cep },
                                                dataType: 'json',
                                                success: function(response) {
                                                    if (response.error) {
                                                        // Lida com o erro, se houver
                                                        alert(response.error);
                                                    } else {
                                                        // Preenche os campos de endereço com os valores retornados
                                                        $('#endereco').val(response.logradouro + ' , ' + response.bairro + ' , ' + response.localidade + ' , ' + response.uf);
                                                    }
                                                },
                                                error: function() {
                                                    // Lida com erros de requisição
                                                    alert('Ocorreu um erro na requisição.');
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>";
                }else{
                    echo "                        
                        <label class='txt'>Olá! Boas vindas à EatDrink</label> <br>
                        <label>Vamos configurar sua conta, leva só 1 minuto</label>
                            <br><br>
                        <form action='acao.php' method='post'>
                            <label for='' class='txtA'>Email</label>
                            <div class='col-12 col-md-6'>
                                <input type='text' class='form-control' placeholder='Endereço de e-mail' name='email' id='email' value='$email' required>
                                <div class='erro' id='erroemail'><b>* E-mail informado incorreto.</b></div>";
                                if ($aviso == "EmailCadastrado") {
                                    echo "<div class='' style='color: red;' id='emailcadastrado'><b>* E-mail já cadastrado.</b></div>";
                                };
                            echo "
                            </div>
                            <br>
                            <label for='' class='txtA'>Senha</label>
                            <div class='col-12 col-md-6'>
                                <input type='password' name='password' placeholder='Digite sua senha' class='form-control' id='senha' required>
                            </div>
                            <br>
                            <label for='' class='txtA'>Confirmar Senha</label>
                            <div class='col-12 col-md-6'>
                                <input type='password' class='form-control' placeholder='Digite sua senha novamente' name='senhaConf' id='senhaConf' required onkeyup='validarSenhas()'>
                                <div class='erro' id='errosenha'><b>* As senhas não são iguais.</b></div>
                            </div>
                            <br>
                            <a href='../index.php' value='' class='txtBlack'><b><-Voltar</b></a>
                                <br><br>";
                            echo "
                            <script>
                                function validarSenhas() {
                                    const senha = document.getElementById('senha').value;
                                    const senhaConf = document.getElementById('senhaConf').value;
                                    const botaoAvancar = document.getElementById('botao-avancar');

                                    if (senha !== senhaConf) {
                                        document.getElementById('errosenha').style.display = 'block';
                                        botaoAvancar.disabled = true;
                                    } else {
                                        document.getElementById('errosenha').style.display = 'none';
                                        botaoAvancar.disabled = false;
                                    }
                                }
                            </script>
                            ";

                            echo "
                            <button type='submit' id='botao-avancar' class='btn fLaranja' name='acao' value='cadastre'>Avançar</button>
                        </form>                    
                    ";
                }
            ?>
        </div>
    </body>
</html>