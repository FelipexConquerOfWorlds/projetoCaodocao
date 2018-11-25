<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">

<body>

  <nav class="navbar navbar-expand-md navbar-light bg-dark" style=" margin-bottom: 0px;">

      <div class="container" >


      <a class="navbar-brand" href="../index.php">
        <img src="img/logo.png" class="d-inline-block align-top rounded" alt="" width="250" height="60">
      </a>


      <a class="navbar-brand" href="#">
        <b style="background-image: url('../../projetoCaodocao-master/caodocao/assets/img/logo.png');background-position:left center;background-repeat:repeat;" class="w-75"> </b>
      </a>


      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item"> </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-warning" href="#">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i>Administrativo</a>
        <a class="btn navbar-btn ml-2 text-white btn-warning" href="#">
          <i class="fa d-inline fa-lg fa-github"></i>Animal</a>
        <a class="btn navbar-btn ml-2 text-white btn-warning" href="../index.php">
          <i class="fa d-inline fa-lg fa-reply-all"></i>Sign out</a>
      </div>


      </div>

  </nav>



  <div class="py-5 text-center bg-warning">
    <div class="container">
      <div class="row">
          <table class="table table-black">

              <thead>
              <tr>

                  <th scope="col" style="text-align: center">Ação</th>
                  <th scope="col" style="text-align: center">Nome</th>
                  <th scope="col" style="text-align: center">Email</th>
              </tr>
              </thead>


              <?php

              include_once __DIR__."/../models/CrudUsuario.php";
              include_once __DIR__."/../models/Usuario.php";

              $crudUsuario = new CrudUsuario();
              $usuarios    = $crudUsuario->GetUsuarios();

              foreach ($usuarios as $usuario):?>


              <tbody>


              <tr>
                  <td scope="">
                      <a href="../models/Usuario.php?acao=editar&idusuario=<?=$usuario->getCodUsu();?>" class="btn btn-success" style="column-span: initial">Editar</a>
                      <a href="../models/Usuario.php?acao=banir&idusuario=codigoUsuario" class="btn btn-danger">Banir</a>
                  </td>

                  <td><?=$usuario->getNome();?></td>
                  <td><?=$usuario->getEmail();?></td>
              </tr>

              </tbody>
              <?php endforeach;?>
          </table>

    </div>
  </div>


  <div class="py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-8 my-3">
          <h1 class="display-4 text-white text-md-left text-center">IFC-Aquari-3info1</h1>
        </div>
        <div class="col-md-4  text-center align-self-center">
          <a href="https://www.facebook.com/" target="_blank">
            <i class="fa fa-fw fa-facebook fa-3x text-white mx-3"></i>
          </a>
          <a href="https://twitter.com/" target="_blank">
            <i class="fa fa-fw fa-twitter fa-3x text-white mx-3"></i>
          </a>
          <a href="https://www.instagram.com/" target="_blank">
            <i class="fa fa-fw fa-instagram fa-3x text-white mx-3"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--  <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">-->

</body>

</html>