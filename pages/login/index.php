<?php
    require_once "../../conf/Conexao.php";

    session_start();
    $aviso = isset($_SESSION['aviso']) ? $_SESSION['aviso'] : ""; 
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : ""; 
    // var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" href="../../assets/img/faviconA.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
            h1 {
                font-size: clamp(12px, 10vw, 48px);
            }

            .txt {
                font-family: 'Inter', sans-serif;
                font-size: clamp(24px, 10vw, 30px);
            }
            .txtA {
                font-family: 'Inter', sans-serif;
                font-size: clamp(24px, 10vw, 8px);
            }
            .txtBlack {
                color: black;
            }
            .fLaranja {
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
            .erro {
                display: none;
                color: red;
            }
            body {
                margin-left: 0vh;
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
                    <a href="index.php"><img src="../../assets/img/logoeatdrink.png" alt="logo" width="200vh" class="logo"></a>
            </div>
            <div class="row">
                <div class="col">
                    <label class="txt" style="margin-top:5vh">Olá! Bem-vindo novamente à EatDrink</label>
                        <br>
                    <label>Realize o login</label>
                    <form action="acao.php" method="post">
                        <div class="form-group col-md-6" style="margin-top:5vh">
                            <label for="usuario" class="txtA">Digite seu Email</label>
                                <br>
                            <input type="text" class="form-control" name="email" id="usuario" placeholder="Digite seu email" value="<?php if($email != NULL){echo $email;}else{ echo '';}?>" required>
                                <div class="erro" id="errousuario"><b>* E-mail informado incorreto.</b></div>
                                <?php if ($aviso == 'semcadastro') { echo "<div style='color:red;'><b>* Email não cadastrado.</b></div><div><a style='color:green; text-decoration: none;' href='register/index.php'><b>* Cadastrar</a></b></div>";}?>
                        </div>
                            <br>
                        <div class="form-group col-md-6">
                            <label for="senha" class="txtA">Digite sua Senha</label>
                                <br>
                            <input type="password" class="form-control" name="password" id="senha" placeholder="Digite sua senha" required>
                                <?php if ($aviso == 'senhaerrada') { echo "<div style='color:red;'><b>* Senha informada incorreta.</b></div>";}?>
                        </div>
                </div>
                    <br>
                <div class="row" style="margin-top:5vh">
                    <div class="col-6">
                        <input type="checkbox" name="LembrarSenha" id="lembrarSenha"> <label for="lembrarSenha">Lembrar da senha</label>
                    </div>
                    <div class="col-6">
                        <a href="password/index.php" class="txtBlack">Esqueceu a Senha?</a>
                    </div>
                </div>
                <div style="margin-top:5vh">
                    <a href="../index.php" value='<?php session_destroy(); ?>'class="txtBlack"><b><- Voltar</b></a>
                        <br><br>
                    <button type="submit" id="acao" class="fLaranja btn" name="acao" value="login">Login</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('load', function() {
                document.getElementById('usuario').addEventListener('input', function() {
                    let usuario = this.value;
                    let resultado = usuario.match(/\w+@\w+\.\w+/);

                    if (!resultado) {
                        document.getElementById('errousuario').style.display = 'block';
                    } else {
                        document.getElementById('errousuario').style.display = 'none';
                    }
                });
            });
        </script>
    </body>
</html>
