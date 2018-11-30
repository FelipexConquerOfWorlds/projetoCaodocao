<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-dark" style=" margin-bottom: 0px;">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <img src="../views/img/logo.png" class="d-inline-block fa-align-left rounded" alt="" width="250" height="60" >
        </a>
        <a class="navbar-brand" href="#">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

            <ul class="navbar-nav">
                <li class="nav-item"> </li>
            </ul>
            <a class="btn navbar-btn ml-2 text-dark btn-warning" href="#" contenteditable="true">
                <i class="fa d-inline fa-lg fa-github"></i>Animais</a>
            <a class="btn navbar-btn ml-2 text-dark btn-warning" href="../controller/sfdk.php?acao=logout">
                <i class="fa d-inline fa-lg fa-reply-all"></i>Sign out</a>
        </div>
    </div>
</nav>
<div class="py-5 text-center bg-warning h-75" style="" >
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
                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" >
                        <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>
                    </div>
                </form>

                <?php
                include_once __DIR__."/../models/CrudUsuario.php";
                include_once __DIR__."/../models/Usuario.php";
                $crudUsuario = new CrudUsuario();
                $usuarios  = $crudUsuario->GetUsuarios();
                foreach ($usuarios as $usuario):?>
                    <tbody>
                    <tr>
                        <td scope="">
                            <a href="../controller/sfdklogado.php?acao=promover&id=<?=$usuario->getCodUsu();?>" class="btn btn-success" style="column-span: initial;width: 91px">Promover</a>
                            <a href="../controller/sfdklogado.php?acao=rebaixar&id=<?=$usuario->getCodUsu();?>" class="btn btn-danger" style="width: 91px">Rebaixar</a>
                            <a href="../controller/sfdklogado.php?acao=banir&id=<?=$usuario->getCodUsu();?>"  class="btn btn-danger" style="background-color: black; color: white;width: 91px;position: relative;">Banir</a>
                        </td>
                        <td><?=$usuario->getNome();?></td>
                        <td><?=$usuario->getEmail();?></td>
                    </tr>

                    </tbody>
                <?php endforeach;?>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
<div class="py-5 bg-dark" >
    <div class="container">
        <div class="row" >
            <div class="col-md-8 my-3">
                <h1 class="display-4 text-white text-md-left text-center">IFC-Aquari-3info1</h1>
            </div>
            <div style="position: relative" class="col-md-4  text-center align-self-center">
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
</body>

</html>