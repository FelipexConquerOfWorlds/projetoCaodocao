<?php
    include_once '../models/CrudAnimal.php';
    include_once '../models/CrudDoacao.php';
    include_once '../models/CrudUsuario.php';
    include_once '../models/login.php';

    $tipo_usuario = $_SESSION['cd_tipuser'];

    switch ($tipo_usuario){

        case'3':
        //usuario normal tela e funcoes com switch acao
            if (isset($_GET['acao'])){
                $acao = $_GET['acao'];
            }else{
                $acao = 'index';

            }
            switch ($acao) {

                case 'index':
                include '../views/indexlogado.html';
                break;

                case 'adotar':
                include '../views/adotar.html';
                break;

                case 'verAnimal':
                include '../views/viewanimal.html';
                break;

                //case se o cara quiser o animal que ele acabou de vizualizar

                case 'doar':
                include '../views/animalcad.html';
                break;

                case 'gravaDoar':
                $a = new Animal($_POST['nome'], $_POST['datanascimento'], $_POST['foto_perfil'], $_POST['cod_especie'], $_POST['cod_raca'];



            }


        break;

        case'2':
        //admin tela unica
            include '../views/admin.html';

        case '1':
        //admin master tela unica


    }