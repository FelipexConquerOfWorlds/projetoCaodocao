<?php
require_once '../models/conexao.php';

function editarUsuario(){

}

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once '../models/CrudUsuario.php';
require_once '../models/login.php';
require_once '../models/loginn.php';




switch ($acao){


     case'deslogado':

         header("location: ../views/login.php");
         break;

     case'index':

    $crud = new CrudUsuario();
    $usuarios = $crud->GetUsuarios();
    include '../views/usuario.php';
    break;

    case "editar":
        EditarUsuario();
        break;


    case 'inserir':
        include '../views/usuarios/inserir.php';
    break;

    case 'doar':
    include '../views/login.php';
    break;


    case 'gravaInserir':
        $usuario = new Usuario($_POST['nome'], $_POST['email'],$_POST['cnpj'], $_POST['senha'], $_POST['telefone'], $_POST['estados-brasil'] );
        $crud = new CrudUsuario();
        $cadastra = $crud->CadastrarUsuario($usuario);
//        echo $_POST['nome'];
//        echo $_POST['email'];
//        echo $_POST['telefone'];
//        echo $_POST['senha'];
//        echo $_POST['estados-brasil'];
//        header("location:../views/login.php");
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
    include '../views/login.php';

     case 'Gravalogin':
         $login = new login();
         $login-> verificarCadastro($_POST['email'], $_POST['senha']);
         if ($login == false) {
             //mudar essa pagina para login.php com mensagem de inseriu dados invalidos junto
             include '../view/login.php';
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