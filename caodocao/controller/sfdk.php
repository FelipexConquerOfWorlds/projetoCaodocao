<?php


session_start();

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} else {
    $acao = 'index';

}

require_once "../models/Loginn.php";

switch ($acao) {

    case 'logout':
        session_destroy();
        include '../index.php';
        break;
    case 'index':
        include '../index.php';
        break;

    case 'registrar':
        include '../views/cadastro.html';
        break;

    case 'registrardf':
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['cnpj'], $_POST['senha'], $_POST['estados-brasil'], $_POST['telefone']);
        $crud = new CrudUsuario();
        $crud->CadastrarUsuario($usuario);
        include '../views/login.php';
        break;

    case 'login':
        include '../views/login.php';
        break;

    case 'logindf':
        try {
            $login = new Loginn();

            $login->verificarCadastro($_POST['email'], $_POST['password']);
            header("location: sfdklogado.php");

        } catch (Exception $e) {

            header("location: http://localhost/projetoCaodocao-master/caodocao/controller/sfdk.php?acao=login&msg={$e->getMessage()}");
        }

}