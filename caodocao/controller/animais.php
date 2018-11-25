<?php
session_start();
/**
CONTROLADOR DO CRUD DE ANIMAIS */

//if (isset($_SESSION['nome'])) {

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    } else {
        $acao = 'index';

    }

    require_once '../models/CrudAnimal.php';


    //if tiver logado como admin entra nesse switch
    switch ($acao) {
        case 'index':
            $crud = new CrudAnimal();
            $animais = $crud->GetAnimais();
            include '../index.php';

            break;
        case 'exibir': //vai ter que ser com a funcao filtrar animais
            $crud = new CrudAnimal();
            $animal = $crud->GetAnimal($_GET['cod']);
            include '../views/animais/exibir.php';
            break;

        case 'inserir':

            include '../views/animais/inserir.php'; //abre o FORM DE CADASTRO
            break;

        case 'gravaInserir':



            //ALEM DO POST, O FORMNULARIO COM MULTIPART ENVIA TAMBÉM A VARIAVEL $_FILES - É UM ARRAY QUE CONTEM OS DADOS DO ARQUIVO DA FOTO
            $origem = $_FILES['foto']['tmp_file'];

            $destino = 'assets/imagem/'.date('DmyHis').$_FILES['foto']['name'];
            //move_uploaded_file($origem, $destino);


            $animal = new Animal($_POST['nome'], $_POST['dtnasc'], $destino);
            $crud = new CrudAnimal();
            $mec = $crud->CadastrarAnimais($animal);
            //recebe os dados do FORM via POST
            //chama o crud
            //chama o metodo de insert do crud
            break;

        case 'alterar':
            include '../views/animais/alterar.php';
            break;

        case 'gravaAlterar':
            $animal = new Animal($_POST['nome'], $_POST['dtnasc'], $_POST['foto_perfil']);
            $crud = new CrudAnimal();
            $mec = $crud->UpdateAnimal($animal);
            break;

        case 'apagar':
            $crud = new CrudAnimal();
            $mec = $crud->DeleteAnimal();
            break;

        default:
            echo 'acao inválida';

    }

/*}else{
    echo "acesso negado";
}*/