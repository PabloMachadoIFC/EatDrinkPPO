<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
  rel="stylesheet"
/>
    <title>Document</title>
</head>
<body>
    <!-- Sidenav -->
<nav id="sidenav-1" class="sidenav" data-mdb-hidden="false">
  <ul class="sidenav-menu">
    <li class="sidenav-item">
      <a class="sidenav-link">
        <i class="far fa-smile fa-fw me-3"></i><span>Link 1</span></a>
    </li>
    <li class="sidenav-item">
      <a class="sidenav-link"><i class="fas fa-grin fa-fw me-3"></i><span>Category 1</span></a>
      <ul class="sidenav-collapse show">
        <li class="sidenav-item">
          <a class="sidenav-link">Link 2</a>
        </li>
        <li class="sidenav-item">
          <a class="sidenav-link">Link 3</a>
        </li>
      </ul>
    </li>
    <li class="sidenav-item">
      <a class="sidenav-link"><i class="fas fa-grin-wink fa-fw me-3"></i><span>Category
          2</span></a>
      <ul class="sidenav-collapse">
        <li class="sidenav-item">
          <a class="sidenav-link">Link 4</a>
        </li>
        <li class="sidenav-item">
          <a class="sidenav-link">Link 5</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- Sidenav -->

<!-- Toggler -->
<button data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1" class="btn btn-primary"
  aria-controls="#sidenav-1" aria-haspopup="true">
  <i class="fas fa-bars"></i>
</button>
<!-- Toggler -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"
></script>
</body>
</html>