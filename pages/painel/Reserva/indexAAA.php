<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <title>EAT DRINK - PAINEL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    @media (max-width: 767px) {
      /* Estilos específicos para dispositivos móveis */
      .vertical-menu {
        display: none;
        margin-top: 10px;
      }

      .vertical-menu.show {
        display: block;      
      }
      .navbar-brand img {
      display: none;
    }

    .navbar-brand.mobile-logo {
      display: block;
    }
    }
</style>

  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar bg" style="box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);">
    <div class="container-fluid">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <button class="btn btn dropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <a class="navbar-brand mobile-logo" href="#"><img src="../../assets/img/logoeatdrink.png" class="logo" alt="logo" width="210vh"></a>
            <!-- <a class="navbar-brand desktop-logo" href="#"><img src="" class="logo" alt="logo" width="210vh"></a> -->

            </button>
            <ul class="dropdown-menu vertical-menu">
              <li><a class="dropdown-item" href="#"><img src="../../assets/img/time.png" alt="logo" width="25vh" style="margin-right:1vh;">Pedido do Dia</a></li>
              <li><a class="dropdown-item" href="#"><img src="../../assets/img/spatula.png" alt="logo" width="25vh" style="margin-right:1vh;">Pedidos na Cozinha</a></li>
              <li><a class="dropdown-item" href="#"><img src="../../assets/img/time.png" alt="logo" width="25vh" style="margin-right:1vh;">Inventario</a></li>
              <li><a class="dropdown-item" href="#"><img src="../../assets/img/tablet.png" alt="logo" width="25vh" style="margin-right:1vh;">Meu menu digital</a></li>
              <li><a class="dropdown-item" href="#"><img src="../../assets/img/eye.png" alt="logo" width="25vh" style="margin-right:1vh;">Ver meu menu</a></li>
              <li><a class="dropdown-item" href="../login/acao.php?acao=logoff" style="color: red;"><img src="../../assets/img/sair.png" alt="logo" width="25vh" style="margin-right:1vh;"><b>Sair</b></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="row" style="width: 100%;">
    <div class="col-12">
      <div class="part1" style="margin: 3vh; background-color: #A6A6A6; border-radius: 25px; line-height: 30px; padding: 0.7vh 20px; height: 20vh; width: 98%;"></div>
      <div style="background-color: #F6F5F5;border-radius: 25px;line-height: 30px;padding: 0.7vh 20px;width: 159vh;border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;margin-top: -7vh;margin-left: 3vh;margin-right: 2vh; height: 100%;width: 98%;">
        <div class="col-12">
          <label for="" class="" style="margin-top: 1vh;margin-left: 20vh;"><b>Nome do Estabelecimento</b></label>
          <br>
          <input type="text" class="" style="color:black; margin-left: 20vh; background-color: #F6F5F5;line-height: 30px;font-weight: bold;color:black;border: 0px solid #F67300;" name="" id="" placeholder="">
          <hr class="" style="margin-left: 20vh;height: 2px;margin-top: -1vh;height: 2px;width: 30vh;">
        </div>
        <div class="row">
          <?php
            echo "
            <div class='col-12' style='margin-top: 1vh;margin-left: 0vh;margin-right: 0vh;background-color: #D9D9D9;border-radius: 25px;line-height: 30px;padding: 0.7vh 20px;height: 100vh;width: 100%;'>
              <div class='col-6'>
                <label style='margin-top: 1vh;margin-left: 3.5vh;'><b>Nome da Categoria</b></label>
              </div>
              <div class='col-6'>
                <input class='form-control'style='margin-top: -1.5vh; margin-left: 2vh; border: 1 solid #F67300; border-top: none; border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-left-radius: 8px;border-bottom-right-radius: 8px;' type='text' name='NomeCategoria' id='NomeCategoria' placeholder='Ex. Pizza'>
              </div>
            </div>
            <div class='col-12' style='margin-top: -48%;'>
              <div style='margin-left: 1%;margin-right: 1%;background-color: #F6F5F5;border-radius: 25px;line-height: 30px;padding: 0.7vh 20px;width: 100%;border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;'>
                <div class='col-2'>
                  <form method='post' action='acao.php' enctype='multipart/form-data'>
                    <label for='profile_pic'>
                      <img src='../../assets/img/Upload.png' class='img1 fotoCategoria' alt='Selecione uma imagem' style='width: 100px; height: 100px;'>
                    </label>
                    <input id='profile_pic' type='file' name='profile_pic' accept='image/*' style='display: none;'>
                  </form>
                </div>
                <div class='col-9 espacoA'>
                  <input type='text' style=''placeholder='Ex. Pizza' class='form-control' name='' id=''>
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
          ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    const isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
    if (isMobile) {
      const logoElement = document.querySelector(".navbar-brand img");
      logoElement.src = "../../assets/img/logoeatdrink.png";
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
