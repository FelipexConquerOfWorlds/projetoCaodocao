<?php

    include_once "../models/Loginn.php";
    loginn::islogado();

    if (!isset($_SESSION)){
        session_start();
    }



    include_once '../models/CrudAnimal.php';
    include_once '../models/CrudDoacao.php';
    include_once '../models/CrudUsuario.php';
    include_once '../models/Usuario.php';

    $tipo_usuario = $_SESSION['cd_tipuser'];

    if (isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

//    var_dump($tipo_usuario);

    switch ($tipo_usuario){


        case '4':

           echo "<script>alert('Seu Email ou Senha estão incorretos'); window.history.go(-1);</script>";
            break;

       case'3' :
        //usuario normal tela e funcoes com switch acao
            if (isset($_GET['acao'])){
                $acao = $_GET['acao'];
            }else{
                $acao = 'index';
            }
            switch ($acao) {

                case 'index':
                include '../views/indexlogado.php';
                break;

                case 'adotar':
                //include '../views/adotar.php';
                  include '../views/adotarteste.php';
                break;

               case 'verAnimal':
                include '../views/viewanimal.php';
                break;

               case 'perfil':
                   $usuario =new Usuario();
                   $fotoUsuario = $usuario->getFotoperfil();
                   include '../views/perfilpage.php';
                break;

                case 'queroAdotar':
                    //case se o cara quiser o animal que ele acabou de vizualizar
                    //iniciar o chat quando apertado esse botao

                case 'doar':
                include '../views/animalcad.php';
                break;

                case 'gravaDoar':
                $a = new Animal($_POST['nome'], $_POST['datanascimento'], $_POST['foto_perfil'], $_POST['cod_especie'], $_POST['cod_raca']);
                $crudDoa = new CrudDoacao();
                $crudAni = new CrudAnimal();
               $crudAni->CadastrarAnimais($a);
                $d = new Doacao($_SESSION['cod_usu'], 1);
                $crudDoa->insertDoacao($d);
            }
            break;
        case 'perfil':
            $usuario= new Usuario();
            print_r($this->getFotoperfil());
            if ($usuario->getFotoperfil()== null) {
                $fotoUsuario = "portfolio/fotoperfil.jpg";
            }else{
               $fotoUsuario = $usuario ->getFotoperfil();
            }

            include '../views/perfilpage.php';

            break;

        case'2':
        //admin tela unica
            include '../views/admin.php';
            switch ($acao){
                case 'editar':
                    break;
            }
            break;

        case '1':
            switch ($acao){
                case 'editar':

                    $usuario= new Usuario();
                    $crudUsuario = new CrudUsuario();
                    $id2 = $_SESSION['cod_usu'];
                    $crudUsuario ->UpdateUsuario($id2);

                    break;

                case 'banir':
            }
        include '../views/admin.php';
        break;

    }