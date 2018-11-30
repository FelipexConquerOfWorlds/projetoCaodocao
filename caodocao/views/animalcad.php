<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>
<link rel="stylesheet" href="../views/theme.css" type="text/css">
</head>

<body class="bg-warning">
<nav class="navbar navbar-expand-md navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../views/img/logo.png" class="d-inline-block align-top rounded" alt="" width="250" height="60">
        </a>
        <a class="navbar-brand" href="#">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbar2SupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"></li>
            </ul>
            <a class="btn navbar-btn ml-2 text-dark btn-warning" href="../index.php">
                <i class="fa d-inline fa-lg fa-reply-all"></i> Página Inicial</a>
        </div>
    </div>
</nav>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card text-white p-5 bg-dark">

                    <h1 class="mb-4 w-75">Cadastre-se seu Animal </h1>
                    <form method="post" action="../controller/sfdklogado.php?acao=gravaDoar">
                        <div class="form-group">
                            <label for='selecao-arquivo'>Upe uma foto do seu animal</label>
                            <input class="btn btn-warning" id='selecao-arquivo' name="foto_perfil" type='file'></div>
                        <div class="form-group">
                            <input name="nome" type="text" class="form-control" placeholder="Nome"></div>

                        <div class="form-group">
                            <input name="datanascimento" type="date" class="form-control"
                                   placeholder="Data de nascimento">
                        </div>


                        <div class="form-group">
                            <select name="cod_especie" class="btn btn-white w-100">
                                <option value="1">Cão</option>
                                <option value="2">Gato</option>
                                <option value="3">Outro</option>
                            </select>
                        </div>


                        <div class="form-group">

                            <select name="cod_raca" class="btn btn-white w-100">
                                <?php
                                include_once __DIR__ . "/../models/CrudAnimal.php";
                                $crud = new CrudAnimal();
                                $listas = $crud->pegarRacas();
                                $nomes = $listas[1];
                                $cods_racas = $listas[0];
                                for ($i = 0; $i < count($cods_racas); $i++):?>
                                    <option value="<?= $cods_racas[$i]; ?>"><?= $nomes[$i]; ?></option>
                                <?php endfor; ?>

                            </select>

                        </div>
                        <div class="form-group" style="text-align: center;">
                            <button type="submit" class="btn btn-warning" style="width: 394px;">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>