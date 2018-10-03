<?php


    session_start();

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once "../models/login.php";

switch ($acao) {

    case 'index';
        include '../views/index.html';
        break;

    case 'registrar';
        include '../views/cadastro.html';
        break;

    case 'registrardf';
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['cnpj'], $_POST['cod_cida'], $_POST['cod_usu']);
        $crud = new CrudUsuario();
        $crud->CadastrarUsuario($usuario);
        break;

    case 'login';
        include '../views/login.html';
        break;

    case 'logindf';
        $login = new login();
        $login->verificarCadastro($_POST['email'], $_POST['senha']);
        if ($login == false) {
         //mudar essa pagina para login.html com mensagem de inseriu dados invalidos junto
            include '../view/login.html';
        } else {
           //perguntar ao jeffinho como perpetuar os dados da session q eu criei na funçao login para filtrar as paginas por nivel de usuario,
            include 'sfdklogado.php';
        }
}