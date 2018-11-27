<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

</head>
<BODY>
<div class="py-5 text-center bg-warning h-75" style="" >
    <div class="container">
        <div class="row">
            <table class="table table-black">
                <thead>
                <tr>
                    <th scope="col" style="text-align: left">Ação</th>
                    <th scope="col" style="text-align: left">Nome</th>
                    <th scope="col" style="text-align: left">Email</th>
                </tr>
                </thead>
                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" >
                        <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>
                    </div>
                </form>

                <?php
                include_once __DIR__."/../models/CrudAnimal.php";
                include_once __DIR__."/../models/Animal.php";
                $crudAnimal = new CrudAnimal();
                $animais    = $crudAnimal->GetAnimais();
                foreach ($animais as $animal):?>


                    <tbody>


                    <tr>
                        <td scope="">
                            <a href="../controller/sfdklogado.php?acao=editar   " class="btn btn-success" style="column-span: initial">Editar</a>
                            <a href="../models/Usuario.php?acao=banir&idusuario=codigoUsuario" class="btn btn-danger">Banir</a>
                        </td>

                        <td><?=$animal->getNome();?></td>

                        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $animal->getFotoPerfil() ).'"/>';?></td>
                        <td><?=$animal->getCodRaca();?></td>
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
</BODY>
</html>