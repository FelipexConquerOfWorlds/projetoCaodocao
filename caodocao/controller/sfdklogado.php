<?php

    include_once '../models/login.php';

    $tipo_usuario = $_SESSION['cd_tipuser'];

    switch ($tipo_usuario){

        case'1';
        //usuario normal tela e funcoes com switch acao
        break;

        case'2';
        //admin tela unica
        case '3';
        //admin master tela unica


    }