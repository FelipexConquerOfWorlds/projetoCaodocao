<?php

if (!isset($_SESSION)){
    session_start();
}

require_once "Usuario.php";
require_once "CrudUsuario.php";
require_once "Conexao.php";

class Login {

    public $conexao;


    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    private function emailExists($email) {

        $sql = "select count(email) from usuario where email = '{$email}'";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($resultado['email'] > 0) {
            return true;
        }

        return false;

    }

    public static function islogado(){
        if(!isset($_SESSION['cod_usu'])){
            header('Location: ../views/login.php');
        }
    }

    public function verificarCadastro($email, $senha){

            if ($this->emailExists($email)){

                $sql = "select * from usuario where senha = '{$senha}' and email = '{$email}'";
                $usuario = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);


                if (!empty($usuario)){

                    $objUsu = new Usuario($usuario['nome'], $usuario['email'], $usuario['cod_usu'], $usuario['cnpj'], $usuario['senha'], $usuario['telefone'], $usuario['cod_cida'], $usuario['cd_tipuser']);

                    $_SESSION['cod_usu']    = $objUsu->getCodUsu();
                    $_SESSION['nome']       = $objUsu->getNome();
                    $_SESSION['email']      = $objUsu->getEmail();
                    $_SESSION['cod_usu']    = $objUsu->getCodUsu();
                    $_SESSION['cnpj']       = $objUsu->getCnpj();
                    $_SESSION['senha']      = $objUsu->getSenha();
                    $_SESSION['telefone']   = $objUsu->getTelefone();
                    $_SESSION['cod_cida']   = $objUsu->getCodCida();
                    $_SESSION['cd_tipuser'] = $objUsu->getCdTipuser();

                    return $objUsu;

                }

                throw new Exception('usuário ou senha incorretos');

            }

    }

//    public function verifyPermission() {
//        print_r($_SESSION);
//    }


    public function tipouser($email){

        $sql = "select cd_tipuser from tip_user, usuario where email = '{$email}'";

        $resultado = $this->conexao->query($sql);

        $tip_usuario = 0;

        if ($resultado == 1){
            $tip_usuario = 'admin_master';
        } elseif($resultado == 2){
            $tip_usuario = 'admin';
        } elseif ($tip_usuario == 3){
            $tip_usuario = 'user';
        }
        return $tip_usuario;
    }



}

$teste = new Login();
$teste->verificarCadastro('felipepborba@hotmail.com', 'senhadogit123');