<?php

include_once "../models/Loginn.php";
Loginn::islogado();

if (!isset($_SESSION)) {
    session_start();
}


include_once '../models/CrudAnimal.php';
include_once '../models/CrudDoacao.php';
include_once '../models/CrudUsuario.php';
include_once '../models/Usuario.php';

$tipo_usuario = $_SESSION['cd_tipuser'];


if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} else {
    $acao = 'index';
}


switch ($tipo_usuario) {


    case '1':

        echo "<script>alert('Seu Email ou Senha estão incorretos'); window.history.go(-1);</script>";
        break;

    case'3' :
        //usuario normal tela e funcoes com switch acao

        switch ($acao) {

            case 'index':
                include '../views/indexlogado.php';
                break;

            case 'adotar':
                //include '../views/adotar.php';
                include '../views/login.php';
                break;

            case 'verAnimal':
                include '../views/viewanimal.php';
                break;

            case 'perfil':
                $usuario = new Usuario();
                $fotoUsuario = $usuario->getFotoperfil();
                include "../views/perfilpage.php";
                break;

            case 'queroAdotar':
                //case se o cara quiser o animal que ele acabou de vizualizar
                //iniciar o chat quando apertado esse botao
                $id = $_GET['id'];
                $crud = new CrudAnimal();
                $animal = $crud->GetAnimal($id);
                $nomeRaca = $crud->pegarRaca($animal->getCodRaca());
                $nomeDono = $crud->pegarNomeUsuario($id);
                $idDono = $crud->pegarIdDono($id);
                $_SESSION['nomeDog'] = $animal->getNome();
                $_SESSION['nomeRaca'] = $nomeRaca['descricao'];
                $_SESSION['fotoPerfilDog'] = $animal->getFotoPerfil();
                $_SESSION['Datanascimento'] = $animal->getDatanascimento();
                $_SESSION['nomeDonoDog'] = $nomeDono['nome'];
                $_SESSION['idDonoDog'] = $idDono['cod_usu'];
                include '../views/viewanimal.php';
                break;
            case 'doar':
                include '../views/animalcad.php';
                break;

            case 'gravaDoar':
                $crudDoa = new CrudDoacao();
                $d = new Doacao($_SESSION['cod_usu'], 1 );
                $crudDoa->insertDoacao($d);

                //ESSA PORRA AQUI TA FUNFANDO
                $a = new Animal($_POST['nome'], $_POST['datanascimento'], $_POST['foto_perfil'], $_POST['cod_raca'], $crudDoa->pegarUltimoId());
                $crudAni = new CrudAnimal();
                $crudAni->CadastrarAnimais($a);
                include '../views/indexlogado.php';
                break;

            case 'logout':
                header('../controller/sfdk.php?acao=index');
                session_destroy();
                break;

            case 'contactarDono':
                include '../views/perfilpage.php';
        }
        break;
    case 'perfil':
        $usuario = new Usuario();
        print_r($this->getFotoperfil());
        if ($usuario->getFotoperfil() == null) {
            $fotoUsuario = "portfolio/fotoperfil.jpg";
        } else {
            $fotoUsuario = $usuario->getFotoperfil();
        }

        include '../views/perfilpage.php';

        break;

    case'4':
        switch ($acao) {
            case 'editar':
                break;
        }break;


        case '5':
            var_dump($_SESSION['cd_tipuser']);
            switch ($acao) {

            case 'index';
            include '../views/admin.php';
            break;

            case 'promover':
                $id = $_GET['id'];
                $crud = new CrudUsuario();
                $crud->PromoverUsu($id, 'p');
                include '../views/admin.php';
                break;

            case 'rebaixar':
                $id = $_GET['id'];
                $crud = new CrudUsuario();
                $crud->PromoverUsu($id, 'd');
                include '../views/admin.php';
                break;

            case 'banir';
                $id = $_GET['id'];
                $crud = new CrudUsuario();
                $crud->DeleteUsuario($id);
                header('../views/admin.php');

        }
        break;
}