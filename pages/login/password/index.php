<?php
    session_start();
    
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);
    $path = '../../../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);  
    
    // echo "<br> POST:<br>";
    // var_dump($_POST);
    // echo "<br><br>GET:<br>";
    // var_dump($_GET);
    // echo "<br><br> SESSION:<br>";
    // var_dump($_SESSION);

    $notification = isset($_SESSION['notification']) ? $_SESSION['notification'] : ""; 
    $email = isset($_GET['email']) ? $_GET['email'] : "NULL"; 
    $part = isset($_SESSION['part']) ? $_SESSION['part'] : "";    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/img/faviconA.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
        h1{
            font-size: clamp(12px, 10vw, 48px);
        }
        .txt{
            font-family: 'Inter', sans-serif;
            font-size: clamp(24px, 10vw, 30px);
        }
        .txtA{
            font-family: 'Inter', sans-serif;
            font-size: clamp(24px, 10vw, 8px);
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
        .erro{
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
                    <a href="../index.php"><img src="../../../assets/img/logoeatdrink.png" alt="logo" width="200vh" class="logo"></a>
            </div>
            <div class="row">
                <?php
                // var_dump($_POST);
                $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
                $codUser = isset($_SESSION['codUser']) ? $_SESSION['codUser'] : 0;
                if ($part == '') {
                    echo "
                    <div class='col' style='margin-top:5vh'>
                        <label class='txt'>Esqueceu sua senha?</label> <br>
                        <label>Enviaremos um link por e-mail para você alterar sua senha</label>
                    </div>
                        <br>
                    <div class='col-12' style='margin-top:5vh'>
                        <form action='acao.php' method='post'>
                            <label for='email' class='txtA'>Endereço de e-mail</label>
                            <div class='col-md-6'>
                                <input type='text' class='form-control' placeholder='Endereço de e-mail' name='email' id='email' value='$email' required>
                                ";
                                if ($notification == "NotEmail") {
                                    echo "<div style='color:red;'><b>* Email não cadastrado.</b></div><div><a style='color:green; text-decoration: none;' href='../register/index.php'><b>* Cadastrar</a></b></div>";
                                }
                                echo "
                            </div>
                    </div>
                    <div class='col-12' style='margin-top:3vh'>
                        <div class='col-md-6'>
                            <a href='../index.php' style='color:black;'><b><-Voltar</b></a>
                        </div>
                        <div class='col-md-6' style='margin-top:5vh'>
                            <button type='submit' id='acao' class='btn fLaranja' name='acao' value='email'>Avançar</button>
                        </div>
                        </form>
                    </div>
                    ";
                } elseif ($part == 'token') {
                    echo "
                    <div class='col' style='margin-top:5vh'>
                        <label class='txt'>Esqueceu sua senha?</label> 
                            <br>
                        <label>Digite o código que foi enviado a você</label>
                    </div>
                        <br>
                    <div class='col-12' style='margin-top:5vh'>
                        <form action='acao.php' method='post'>
                            <label for='email' class='txtA'>Código</label>
                                <br><br>
                            <div class='col-6'>
                                <input type='text'class='form-control'  style='width=1px;' placeholder='Digite o código' name='cod' id='cod' required>";
                                if ($notification == "tokenWrong") {
                                    echo "<div style='color:red;'><b>* Código informado incorreto.</b></div>";
                                } elseif ($notification == "tokenExpiry") {
                                    echo "<div style='color:red;'><b>* Tempo do Código Expirou.</b></div>";
                                }else{
                                    echo "<div style='color:green;'><b>* Codigo enviado para seu email.</b></div>";
                                }
                                echo "
                            </div>
                            <br><br>
                            <a href='../index.php' style='color:black;'><b><-Voltar</b></a>
                            <br><br><br>
                            <button type='submit' id='acao' class='btn fLaranja' name='acao' value='tokenC'>Avançar</button>
                        </form>
                    </div>
                    ";

                } elseif ($part == 'reset') {
                    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
                    $_SESSION['email'] = $email;
                    echo "
                    <div class=''>
                        <div class='txt'>Esqueceu sua senha?</div>
                        <div>Digite a sua nova senha</div>
                            <br>
                        <form action='acao.php' method='post'>
                            <label for='senha' class='txtA'>Digite sua nova senha</label>
                            <div class='col-12 col-md-6'>
                                <input type='password' class='form-control' placeholder='Senha' name='newPassword' id='senha' required>
                            </div>
                            <br><br>
                            <label for='senhaConf' class='txtA'>Digite novamente sua nova senha</label>
                            <div class='col-12 col-md-6'>
                                <input type='password' class='form-control' placeholder='Senha' name='newPasswordC' id='senhaConf' required>
                            </div>
                            <b><div id='senha-erro' class='text-danger'></div></b>
                            <br><br>
                            <a href='login.php' style='color:black;'><b><-Voltar</b></a>
                                <br><br><br>
                            <button type='submit' id='acao' class='btn fLaranja' name='acao' value='reset' disabled>Pronto!</button>
                        </form>
                    </div>
                    ";
                }
            ?>
        </div>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var senha = document.getElementById('senha');
            var senhaConf = document.getElementById('senhaConf');
            var acaoBtn = document.getElementById('acao');
            var senhaErro = document.getElementById('senha-erro');

            function verificarSenhasIguais() {
                if (senha.value !== senhaConf.value) {
                    senhaErro.textContent = "* Senhas não são iguais.";
                    acaoBtn.disabled = true; // Desativar o botão
                } else {
                    senhaErro.textContent = ""; // Limpar mensagem de erro
                    acaoBtn.disabled = false; // Ativar o botão
                }
            }

            senha.addEventListener('input', verificarSenhasIguais);
            senhaConf.addEventListener('input', verificarSenhasIguais);
        });
    </script>
</html>