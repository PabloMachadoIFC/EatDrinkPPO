<?php $path = '../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/x-icon" href="../assets/img/faviconA.png">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>EatDrink</title>
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
                font-size: clamp(24px,10vw,70px);
            }
            .txtA{
                font-family: 'Open Sans', sans-serif;
                font-size: clamp(24px,10vw,10px);
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

            .laranja{
                color: #F67B30;
            }
            body{
               background: url("../assets/img/xxx.png") no-repeat  center;
               background-size: cover;
               height: 88.4vh;
            }
            
            @media screen and (max-width:920px){
                body{
                    background: none;
                    background-color:white;
                    display: flex;
                }


                .fLaranja {
                    height: 40px;
                    width: 120px;
                    line-height: 40px;
                    padding: 5px 15px;
                    display: flex; /* Alterar para flex */
                    justify-content: center; /* Centralizar horizontalmente */
                    align-items: center; /* Centralizar verticalmente */
                }

            }
        </style>
    </head>
    <body>
        <div style="margin: 5vh;">
            <div class="row">
                    <a href="index.php"><img src="../assets/img/logoeatdrink.png" width="200vh"></a>
            </div>
            
            <div class="row" style="margin-top: 17vh;">
                <div class="col-11 h">
                    <h1 class="txt">Soluções <span class="txt laranja">digitais </span>para <br>
                    aumentar os <span class="txt laranja">lucros </span>e <span class="txt laranja">reduzir</span> <br>
                    as despesas</h1>
                </div>
            </div>
            <div class="row" style="margin-top: 5vh;">
                <div class="col-12">
                    <a type="button" class="btn fLaranja" href="login/index.php">Entrar</a>
                </div>
            </div>
            <div class="row" style="margin-top: 5vh;">
                <div class="col-8">
                    <p class="txtA"><b>Caso não tenha se cadastrado,</b> <a href="login/register/index.php" style="color: #F67B30;" name="cad" value="NULL">FAZER CADASTRO</a></p> 
                </div>
            </div>
        </div>
    </body>
</html>