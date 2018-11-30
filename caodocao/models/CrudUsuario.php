<?php

require_once "Usuario.php";
require_once "Conexao.php";

class CrudUsuario
{
    public $conexao;


    public function __construct()
    {
        $this->conexao = Conexao::getConexao();

    }


    public function GetUsuarios()
    {

        $sql = "select * from usuario";

        $result = $this->conexao->query($sql);

        $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);


        $listaUsuarios = [];


        foreach ($usuarios as $usuario) {

            $obUsu = new Usuario($usuario['nome'], $usuario['email'], $usuario['cnpj'], $usuario['senha'], $usuario['cod_esta'], $usuario['telefone'], $usuario['cd_tipuser'], $usuario['fotoperfil'], $usuario['cod_usu']);

            $listaUsuarios[] = $obUsu;
        }
        return $listaUsuarios;
    }

    public function GetUsuario($id)
    {

        $sql = "select * from usuario where cod_usu ='{$id}'";

        $resultado = $this->conexao->query($sql);

        $arrai = $resultado->fetch(PDO::FETCH_ASSOC);

        $usuario = new Usuario($arrai['nome'], $arrai['email'], $arrai['cnpj'], $arrai['senha'], $arrai['cod_esta'], $arrai['telefone'],$arrai['cd_tipuser'], $arrai['fotoperfil'], $arrai['cod_usu']);

        return $usuario;
    }

    public function CadastrarUsuario(Usuario $usuario)
    {

        $sql = "insert into usuario (nome, email, cnpj, senha, telefone, cod_esta, cd_tipuser) values ('{$usuario->getNome()}','{$usuario->getEmail()}','{$usuario->getCnpj()}','{$usuario->getSenha()}','{$usuario->getTelefone()}','{$usuario->getCodEsta()}','{$usuario->getCdTipuser()}')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function UpdateUsuario(Usuario $usuario)
    {

        $sql = "update usuario SET nome ='{$usuario->getNome()}', email ='{$usuario->getEmail()}', telefone ='{$usuario->getTelefone()}' ,senha ='{$usuario->getSenha()}', cnpj ='{$usuario->getCnpj()}', cod_cida ='{$usuario->getCodesta()}', cd_tipuser = '{$usuario->getCdTipuser()}' where cod_usu = '{$usuario->getCodUsu()}'";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function DeleteUsuario(int $cod_usu)
    {

        $sql = "delete from usuario where cod_usu ='{$cod_usu}'";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function PromoverUsu($id, $promoverOuDiminuir)
    {
        $usuario = $this->GetUsuario($id);

        if ($promoverOuDiminuir == 'p') {
            $cdQeugosto = $usuario->getCdTipuser() + 1;
        }elseif($promoverOuDiminuir == 'd'){
            $cdQeugosto = $usuario->getCdTipuser() - 1;
        }

        $sql = "update usuario set cd_tipuser = '{$cdQeugosto}' where cod_usu = '{$id}'";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return$cdQeugosto;
    }
}
$r = new CrudUsuario();


$r->GetUsuarios();

