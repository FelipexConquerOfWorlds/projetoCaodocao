<?php
/**
CONTROLADOR DO CRUD DE ANIMAIS */


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once '../models/CrudAnimal.php';

//if tiver logado como admin entra nesse switch
switch ($acao){
    case 'index':
        $crud = new CrudAnimal();
        $animais  = $crud->GetAnimais();
        include '../views/animais/index.php';

        break;
    case 'exibir':
        $crud = new CrudAnimal();
        $animal  = $crud->GetAnimal($_GET['cod']);
        include '../views/animais/exibir.php';


        break;

    case 'inserir':

        include '../views/animais/inserir.php'; //abre o FORM DE CADASTRO
        break;

    case 'gravaInserir':
        //recebe os dados do FORM via POST
        //chama o crud
        //chama o metodo de insert do crud
        break;

    case 'alterar':

        break;

    case 'gravaAlterar':

        break

    case 'apagar':

        break;

    default:
        echo 'acao inválida';

}