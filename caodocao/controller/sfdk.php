<?php


session_start();

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once "../models/Login.php";

switch ($acao) {

    case 'index';
        include '../views/index.php';
        break;

    case 'registrar';
        include '../views/cadastro.html';
        break;

    case 'registrardf';
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['cpf']/*, $_POST['estados_brasil']*/);
        $crud = new CrudUsuario();
        $crud->CadastrarUsuario($usuario);
        break;

    case 'login';
        include '../views/login.php';
        break;

    case 'logindf';
        try {

            $login = new Login();

            $login->verificarCadastro($_POST['email'], $_POST['password']);

            header('location:sfdklogado.php');

        } catch (Exception $e){
            header("location: http://localhost/projetoCaodocao-master/caodocao/controller/sfdk.php?acao=login&msg={$e->getMessage()}");
        }

}