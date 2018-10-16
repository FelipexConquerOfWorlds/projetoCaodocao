<?php

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once '../models/CrudUsuario.php';
require_once '../models/login.php';

switch ($acao){


     case'index':

    $crud = new CrudUsuario();
    $usuarios = $crud->GetUsuarios();
    include '../views/usuario.php';
    break;


    case 'inserir':
        include '../views/usuarios/inserir.php';
    break;

    case 'doar':
    include '../views/login.html';
    break;


    case 'gravaInserir':
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha']);
        $crud = new CrudUsuario();
        $cadastra = $crud->CadastrarUsuario($usuario);
    break;

    case 'atualizar':
        include '../views/usuarios/atualizardadosUsu.php';

    break;

    case 'gravaAtualizar':
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpf'],$_POST['senha']);
        echo $usuario;
        $crud = new CrudUsuario();
        $atualiza = $crud->UpdateUsuario($usuario);
        break;

    case 'deletar':
        $crud = new CrudUsuario();
        $apaga = $crud->DeleteUsuario($_GET['id']);
        break;

    case 'login':
    include '../views/login.html';

     case 'Gravalogin':
         $login = new login();
         $login->verificarCadastro($_POST['email'], $_POST['senha']);
         if ($login == false) {
             //mudar essa pagina para login.html com mensagem de inseriu dados invalidos junto
             include '../view/login.html';
         } else {
             //perguntar ao jeffinho como perpetuar os dados da session q eu criei na funçao login para filtrar as paginas por nivel de usuario,
             header('location:sfdklogado.php') ;
         }
            break;


//        $sql = "select .... where login=";

        //se deu certo, grava os dados na sessão
    //    $_SESSION['nome'] = $usuario->getNome();
    //    grava todas as informaçõpes que quiser
    //redireciona

}