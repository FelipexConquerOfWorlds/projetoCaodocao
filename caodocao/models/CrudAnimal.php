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


    public function GetAnimal(int $id)
    {

        $sql = "select * from animal, doacao, statusdoacao where cod_animal = '{$id}' and statusdoacao.cod_status = 1";

        $resultado = $this->conexao->query($sql);

        $animal = $resultado->fetch(PDO::FETCH_ASSOC);

        $objetoAnimal = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_doacao'], $id);

        return $objetoAnimal;
    }

    public function GetAnimais()
    {


        $sql = "select * from animal, raca, especie, doacao, statusdoacao 
                where raca.cod_raca = animal.cod_raca and raca.cod_especie = especie.cod_especie and animal.cod_doacao = doacao.cod_doacao and doacao.cod_status = statusdoacao.cod_status and statusdoacao.cod_status = 1";

        $resultado = $this->conexao->query($sql);

        $animais = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaAnimais = [];

        foreach ($animais as $animal) {
            $animal = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_doacao'], $animal['cod_animal']);
            $listaAnimais[] = $animal;
        }

        return $listaAnimais;
    }

    public function CadastrarAnimais(Animal $animal)
    {


        //a foto no BD é apenas o endereço

        $sql = "insert into animal (nome, datanascimento, foto_perfil, cod_raca, cod_doacao) values ('" . $animal->getNome() . "','" . $animal->getDatanascimento() . "','" . $animal->getFotoPerfil() . "','" . $animal->getCodRaca() . "','" . $animal->getCodDoacao()."')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function UpdateAnimal(Animal $animal)
    {

        $sql = "update animal SET nome = '{$animal->getNome()}', datanascimento = '{$animal->getDatanascimento()}', foto_perfil ='{$animal->getFotoPerfil()}', cod_especie ='{$animal->getCodEspecie()}' cod_raca = '{$animal->getCodRaca()}',
cod_doacao ='{$animal->getCodDoacao()}', cod_animal = '{$animal->getCodAnimal()}'";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function DeleteAnimal(int $id)
    {

        $sql = "delete from animal where id = '{$id}'";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FiltrarAnimais($datanascimento = "3=3", $cod_especie = "1=1", $cod_raca = "2=2")
    {

        if ($datanascimento != "3=3") {
            $datanascimento = "datanascimento = '{$datanascimento}'";
        }
        if ($cod_especie != "1=1") {
            $cod_especie = "cod_especie = '{$cod_especie}'";
        }
        if ($cod_raca != "2=2") {
            $cod_raca = "cod_raca = '{$cod_raca}'";
        }

        $sql = "SELECT * FROM `animal` WHERE '{$datanascimento}' and '{$cod_especie}'and '{$cod_raca}'";
        $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);


        $resultado = array();
        foreach ($res as $animal) {
            $animala = new Animal($animal['nome'], $animal['datanascimento'], $animal['foto_perfil'], $animal['cod_raca'], $animal['cod_especie'], $animal['cod_doacao'], $animal['cod_animal']);
            $resultado[] = $animala;
        }

        return $resultado;


    }

    public function insertRaca($cod_especie, $descricao)
    {

        $sql = "insert into raca(cod_especie, descricao) values ('{$cod_especie}', '{$descricao}')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }


    public function insertEspecie($descricao)
    {

        $sql = "insert into especie(descicao) values ('{$descricao}')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }


    public function pegarRacas()
    {

        $sql = "select cod_raca, descricao from raca";

        $resultado = $this->conexao->query($sql);

        $racas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $cod_raca = array();
        $nome_raca = array();

        foreach ($racas as $raca) {

            $cod_raca[] = $raca['cod_raca'];
            $nome_raca[] = $raca['descricao'];
        }

        $resul = array($cod_raca, $nome_raca);

        return $resul;
    }

    public function pegarRaca($id){
        $sql = "select descricao from raca where cod_raca = '{$id}'";

        $resultado = $this->conexao->query($sql);

        $raca = $resultado->fetch(PDO::FETCH_ASSOC);

        return $raca;
    }

    public function pegarNomeUsuario($id){

        $sql = "select usuario.nome as nome from usuario, doacao, animal where usuario.cod_usu = doacao.cod_usu and doacao.cod_doacao = animal.cod_doacao and cod_animal = '{$id}'";

        $resultado = $this->conexao->query($sql);

        $nomeUsuario = $resultado->fetch(PDO::FETCH_ASSOC);

        return $nomeUsuario;
    }

    public function pegarIdDono($id){

        $sql = "select usuario.cod_usu as cod_usu from usuario, doacao, animal where usuario.cod_usu = doacao.cod_usu and doacao.cod_doacao = animal.cod_doacao and cod_animal = '{$id}'";

        $resultado = $this->conexao->query($sql);

        $idUsuario = $resultado->fetch(PDO::FETCH_ASSOC);

        return $idUsuario;
    }

}
