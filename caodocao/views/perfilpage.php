 <?php
                include_once __DIR__."/../models/CrudUsuario.php";
                include_once __DIR__."/../models/Usuario.php";

                $CrudUsuario = new CrudUsuario();
                $CrudUsuario ->GetUsuario($_SESSION['idDonoDog']);
                $usuario = new Usuario();
                $usuario->setAllValues($CrudUsuario->GetUsuario($_SESSION['idDonoDog']));
                $img     = $usuario->getFotoperfil();
                $nomeDono = $usuario->getNome();
                echo $img;
                ?>

 <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../views/img/logo.png" class="d-inline-block align-top rounded" alt="" width="250" height="60"> </a>
      <a class="navbar-brand" href="#">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item"> </li>
        </ul>
          <div style="display: flow">
        <a class="btn navbar-btn ml-2 text-dark btn-warning" href="#">
          <i class="fa d-inline fa-lg fa-github"></i> Animais</a>
        <a class="btn navbar-btn ml-2 text-dark btn-warning" href='../views/indexlogado.php'>
          <i class="fa d-inline fa-lg fa-reply-all"></i> Voltar </a>
      </div>
      </div>
    </div>
  </nav>
  <div class="p-0 bg-warning w-100">
    <div class="container">
      <div class="row h-100 w-100 mx-5 px-1">
        <div class="col-4 col-sm-6 col-md-6 col-lg-7 col-xl-7 bg-dark border border-dark w-50 h-100 m-1">
          <div class="card bg-dark">
            <img class="card-img-top p-4"  src="<?php echo $usuario->getFotoperfil();?>" alt="Card image cap">
            <div class="card-body bg-dark w-100 p-0">

              <h5 class="card-title">Nome:<?=$usuario->getNome();?>></h5><br>
              <h5 class="card-title">Email:<?=$usuario->getEmail();?></h5><br>
              <h5 class="card-title">Telefone:<?=$usuario->getTelefone();?>a</h5><br>
              <br>
              <a href="../controller/sfdklogado.php?acao=adotar" class="btn btn-warning btn-lg ">Ver mais animais</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>