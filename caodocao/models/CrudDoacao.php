<?php
    require_once 'Conexao.php';
    require_once 'Doacao.php';

class CrudDoacao
{
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }


    public function getDoacoes()
    {
        $sql = "select * from doacao";

        $resultado = $this->conexao->query($sql);

        $doacoes = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $doacoesLista = [];

        foreach ($doacoes as $doacao) {

            $doacao = new Doacao($doacoes['data_doacao'], $doacoes['data_cadastro'], $doacoes['cod_usu'], $doacoes['cod_status'], $doacoes['cod_doacao']);

            $doacoesLista[] = $doacao;

        }

        return $doacoesLista;
    }

    public function getDoacao(int $cod_doacao)
    {

        $sql = "select * from doacao where cod_doacao = '{$cod_doacao}'";

        $resultado = $this->conexao->query();

        $doacao = $resultado->fetch();

        $objdoacao = new Doacao($doacao['data_doacao'], $doacao['data_cadastro'], $doacao['cod_usu'], $doacao['cod_status']);

        return $objdoacao;
    }


    public function insertDoacao(Doacao $doacao)
    {
        //usar a funçao NOW() para data
        $sql = "insert into doacao(data_doacao, data_cadastro, cod_usu, cod_status) values (CURDATE(), CURDATE(), '{$doacao->getCodUsu()}', '{$doacao->getCodStatus()}')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateDoacao(Doacao $doacao){
        $sql = "update doacao SET data_doacao = '{$doacao->getDataDoacao()}', data_cadastro = '{$doacao->getDataCadastro()}', cod_usu = '{$doacao->getCodUsu()}', cod_status = '{$doacao->getCodStatus()}'";

        try{
            $this->conexao->exec($sql);

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }


    public function DeleteDoacao(int $id)
    {

        $sql = "delete from doacao where id ='{$id}'";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}