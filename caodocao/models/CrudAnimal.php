<?php
                        include_once("Conexao.php");
                        include_once("Animal.php");
class CrudAnimal
{


    public function GetAnimal(int $id){
        $this->conexao = DBConnection::getConexao;

        $sql = "select * from animal where cod_animal =".$id;

        $resultado = $this->conexao->query($sql);

        $animal = $resultado->fetch(PDO::FETCH_ASSOC);

        $objetoAnimal = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_doacao'], $animal['cod_usu'], $animal['cod_animal']);

        return $objetoAnimal;
    }

    public function GetAnimais(){

                $this->conexao = DBConnection::getConexao;

                $sql = "select * from animal";

                $resultado = $this->conexao->query($sql);

                $animais = $resultado->fetchAll(PDO::FETCH_ASSOC);

                $listaAnimais = [];

                foreach ($animais as $animal){
                    $animal = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_doacao'], $animal['cod_usu'], $animal['cod_animal']);
                    $listaAnimais[] = $animal;
                }

            return $listaAnimais;
    }

    public function CadastrarAnimais(Animal $animal){
                $this->conexao = DBConnection::getConexao;

                $sql = "insert into animal (nome, datanascimento, foto_perfil, cod_raca, cod_doacao, cod_usu, cod_animal) values ('".$animal->getNome()."','".$animal->getDatanascimento()."','".$animal->getFotoPerfil()."','".$animal->getCodRaca()."','".$animal->getCodDoacao()."','".$animal->getCodUsu()."','".$animal->getCodAnimal()."')";

                try{
                    $this->conexao->exec($sql);

                }catch (PDOException $e){
                    return $e->getMessage();
                }

    }

    public function UpdateAnimal(Animal $animal){
                $this->conexao = DBConnection::getConexao;

                $sql = "update animal SET nome = '{$animal->getNome()}', datanascimento = '{$animal->getDatanascimento()}', foto_perfil ='{$animal->getFotoPerfil()}', cod_raca = '{$animal->getCodRaca()}',
cod_doacao ='{$animal->getCodDoacao()}', cod_usu = '{$animal->getCodUsu()}', cod_animal = '{$animal->getCodAnimal()}'";

                try{
                    $this->conexao->exec($sql);

                }catch (PDOException $e){
                    return $e->getMessage();
                }
    }

    public function DeleteAnimal(int $id){
                $this->conexao = DBConnection::getConexao;

                $sql = "delete from animal where id = '{$id}'";

                try{
                    $this->conexao->exec($sql);

                }catch (PDOException $e){
                    return $e->getMessage();
                }
    }
}