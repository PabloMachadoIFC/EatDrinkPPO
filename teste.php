<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Menu Responsivo</title>
  <style>
    @media (max-width: 767px) {
      /* Estilos específicos para dispositivos móveis */
      #navbarSupportedContent {
        display: none;
      }

      .vertical-menu {
        display: none;
        margin-top: 10px;
      }

      .vertical-menu.show {
        display: block;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#">
      Logo
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Página 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Página 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Página 3</a>
        </li>
      </ul>
    </div>
  </nav>

  <ul class="nav vertical-menu">
    <li class="nav-item active">
      <a class="nav-link" href="#">Página 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Página 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Página 3</a>
    </li>
  </ul>

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
