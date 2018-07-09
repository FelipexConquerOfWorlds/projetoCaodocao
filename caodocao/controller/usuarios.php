<?php

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once '../models/CrudUsuario.php';

switch ($acao){
    case'index':
    $crud = new CrudUsuario();
    $usuarios = $crud->GetUsuarios();
    include '../views/usuarios/usuario.php';
    break;

    case 'exibir':
        $crud = new CrudUsuario();
        $usuario = $crud->GetUsuario($_GET['id']);


        break;

    case 'inserir':
        include '../views/usuarios/inserir.php';
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
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha']);
        $crud = new CrudUsuario();
        $atualiza = $crud->UpdateUsuario($usuario);
        break;

    case 'deletar':
        $crud = new CrudUsuario();
        $apaga = $crud->DeleteUsuario($_GET['id']);
        break;
}