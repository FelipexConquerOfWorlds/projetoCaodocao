<?php


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';

}

require_once "../models/login.php";

    switch ($acao){

        case 'index';
        include '../views/index.html';
        break;

        case 'login';
        include '../views/login.html';
        break;

        case 'loginverifi';
        $login = new login();
        //verifica se o cara esta logado, se nao estiver ele retorna falso, se estiver ele retorna o usuario
        if (empty($login->verificarCadastro($_POST['email'], $_POST['senha']))){
            //dar um jeito de ele redirecionar pro controlador com o cara logado, sendo que ele vai retornar um usuario entao talvez usar um session
        }


    }