<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EAT DRINK - ADM PAINEL</title>
        <base href="http://localhost/eatdrink/pages/painel/admin.php">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <style>
            body {
                background-color: #FFFFFF;
            }

            .txtA {
                font-family: 'Open Sans', sans-serif;
                font-size: clamp(20px, 9vw, 5px);
            }

            .fLaranja {
                background-color: #F67B30;
                height: 100%;
                color: white;
            }

            .fBranco {
                background-color: white;
                color: black;
                margin-top: 2%;
                margin-left: 1vh;
                /* margin-right: 1vh; */
                border-color: white;
                width: 94%;
                border-bottom: 0px;
            }

            .icon {
                float: left;
                width: 10%;
            }

            .iconA {
                float: center;
                width: 10%;
            }

            .row {
                --bs-gutter-x: 0rem;
            }

            .sombra {
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
            }

            .logo {
                width: 30vh;
            }

            .mobile {
                display: none;
            }

            .logoA {
                /* display: flex; */
                width: 100%;
            }
        </style>
    </head>
    <body style="box-sizing: border-box;">
        <div class="row">
            <div class="logoA">
                <div class="col-12 sombra">
                    <a class="navbar-brand" href="../index.php"><img src="../../assets/img/logoeatdrink.png" alt="logo" class="logo"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 fLaranja" style="height: 90.9vh;">
                <button type="submit" style="box-shadow: none;" class="fBranco"><a href="CRUD/user/index.php">Users</a></button>
                <button type="submit" style="box-shadow: none;" class="fBranco"><a href="CRUD/styles/index.php">Culinary Styles</a></button>
                <button type="submit" style="box-shadow: none;" class="fBranco"><a href="CRUD/category/index.php">Category</a></button>
                    <br><br><br><br><br>
                <a href="../login/acao.php?acao=logoff">Desconectar</a>
            </div>
            <div class="col-10 fBrancoB" style="margin-top: 2vh;">

