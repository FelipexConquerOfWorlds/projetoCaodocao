<?php
                        require_once "Conexao.php";
                        include_once("Animal.php");
                        //verificar o cod_status nas consultas para pegar so os diponiveis
class CrudAnimal
{
    public $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }


    public function GetAnimal(int $id){

        $sql = "select * from animal, doacao, statusdoacao where cod_animal =".$id."and statusdoacao.cod_status = 1";

        $resultado = $this->conexao->query($sql);

        $animal = $resultado->fetch(PDO::FETCH_ASSOC);

        $objetoAnimal = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_doacao'], $animal['cod_especie'], $animal['cod_animal']);

        return $objetoAnimal;
    }

    public function GetAnimais(){



                $sql = "select * from animal, doacao, statusdoacao where statusdoacao.cod_status = 1";

                $resultado = $this->conexao->query($sql);

                $animais = $resultado->fetchAll(PDO::FETCH_ASSOC);

                $listaAnimais = [];

                foreach ($animais as $animal){
                    $animal = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_especie'], $animal['cod_doacao'], $animal['cod_animal']);
                    $listaAnimais[] = $animal;
                }

            return $listaAnimais;
    }

    public function CadastrarAnimais(Animal $animal){
                //a foto no BD é apenas o endereço

                $sql = "insert into animal (nome, datanascimento, foto_perfil, cod_especie, cod_raca, cod_doacao, cod_animal) values ('".$animal->getNome()."','".$animal->getDatanascimento()."','".$animal->getFotoPerfil()."','".$animal->getCodEspecie()."','".$animal->getCodRaca()."','".$animal->getCodDoacao()."','".$animal->getCodAnimal()."')";

                try{
                    $this->conexao->exec($sql);

                }catch (PDOException $e){
                    return $e->getMessage();
                }

    }

    public function UpdateAnimal(Animal $animal){

                $sql = "update animal SET nome = '{$animal->getNome()}', datanascimento = '{$animal->getDatanascimento()}', foto_perfil ='{$animal->getFotoPerfil()}', cod_especie ='{$animal->getCodEspecie()}' cod_raca = '{$animal->getCodRaca()}',
cod_doacao ='{$animal->getCodDoacao()}', cod_animal = '{$animal->getCodAnimal()}'";

                try{
                    $this->conexao->exec($sql);

                }catch (PDOException $e){
                    return $e->getMessage();
                }
    }

    public function DeleteAnimal(int $id){

                $sql = "delete from animal where id = '{$id}'";

                try{
                    $this->conexao->exec($sql);

                }catch (PDOException $e){
                    return $e->getMessage();
                }
    }

    public function FiltrarAnimais ($datanascimento = "3=3", $cod_especie = "1=1", $cod_raca = "2=2" ){

                    if ($datanascimento != "3=3"){
                $datanascimento = "datanascimento = '{$datanascimento}'";
                        }
                    if ($cod_especie != "1=1"){
                $cod_especie = "cod_especie = '{$cod_especie}'";
                    }
                    if ($cod_raca != "2=2"){
                 $cod_raca = "cod_raca = '{$cod_raca}'";
                    }

                $sql = "SELECT * FROM `animal` WHERE '{$datanascimento}' and '{$cod_especie}'and '{$cod_raca}'";
                $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);


                $resultado = array();
                foreach ($res as $animal){
                    $animala = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_especie'], $animal['cod_doacao'], $animal['cod_animal']);
                    $resultado[] = $animala;
                }
                
                return $resultado;
                
                
        }

     public function insertRaca($cod_especie, $descricao){

                    $sql = "insert into raca(cod_especie, descricao) values ('{$cod_especie}', '{$descricao}')";

                         try{
                             $this->conexao->exec($sql);

                             }catch (PDOException $e){
                                 return $e->getMessage();
                             }

                         }


      public function insertEspecie($descricao){

                    $sql = "insert into especie(descicao) values ('{$descricao}')";

                      try{
                          $this->conexao->exec($sql);

                      }catch (PDOException $e){
                          return $e->getMessage();
                      }

                  }

}

