<?php

    include_once "../models/Loginn.php";
    loginn::islogado();

    if (!isset($_SESSION)){
        session_start();
    }



    include_once '../models/CrudAnimal.php';
    include_once '../models/CrudDoacao.php';
    include_once '../models/CrudUsuario.php';

    $tipo_usuario = $_SESSION['cd_tipuser'];

    var_dump($tipo_usuario);

    switch ($tipo_usuario){

        case '2':

           echo "<script>alert('Seu Email ou Senha estão incorretos'); window.history.go(-1);</script>";
            break;

       case'4' :
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
                include '../views/adotar.php';
                break;

               case 'verAnimal':
                include '../views/viewanimal.php';
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

        case'3':
        //admin tela unica
            include '../views/admin.php';

        case '1':
        header('location:../views/admin.php');


    }