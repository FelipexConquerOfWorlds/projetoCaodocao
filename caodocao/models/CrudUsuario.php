<?php
require_once "Usuario.php";
require_once "Conexao.php";

class CrudUsuario
{
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
            $obUsu = new Usuario($usuario['nome'], $usuario['email'], $usuario['telefone'], $usuario['senha'], $usuario['cnpj'], $usuario['cod_cida'], $usuario['cod_usu']);

            $listaUsuarios[] = $obUsu;

        }
        return $listaUsuarios;
    }

    public function GetUsuario(int $id)
    {

        $sql = "select * from usuario where id ='{$id}'";

        $resultado = $this->conexao->query($sql);

        $arrai = $resultado->fetch(PDO::FETCH_ASSOC);

        $usuario = new Usuario($arrai['nome'], $arrai['email'], $arrai['telefone'], $arrai['senha'], $arrai['cnpj'], $arrai['cod_cida'], $arrai['cod_usu']);

        return $usuario;
    }

    public function CadastrarUsuario(Usuario $usuario){

        $sql = "insert into usuario(nome, email, telefone, senha, cnpj, cod_cida) values ('{$usuario->getNome()}','{$usuario->getEmail()}','{$usuario->getTelefone()}'.'{$usuario->getSenha()}','{$usuario->getCnpj()}','{$usuario->getCodCida()}')";

        try{
            $this->conexao->exec($sql);

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function UpdateUsuario(Usuario $usuario){

        $sql = "update usuario SET nome ='{$usuario->getNome()}', email ='{$usuario->getEmail()}', telefone ='{$usuario->getTelefone()}'. senha ='{$usuario->getSenha()}', cnpj ='{$usuario->getCnpj()}', cod_cida ='{$usuario->getCodCida()}'";

        try{
            $this->conexao->exec($sql);

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function DeleteUsuario(int $id){

        $sql = "delete from usuario where id ='{$id}'";

        try{
            $this->conexao->exec($sql);

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

}
//
//$r = new CrudUsuario();
//
//
//$sla = new Usuario('sla','sla@gmail','40028922','senha123','1','0987654321');
//
//$r ->CadastrarUsuario($sla);
//
