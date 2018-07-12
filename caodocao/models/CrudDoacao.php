<?php
    require_once 'Conexao.php';
    require_once 'Doacao.php';

class CrudDoacao
{
    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }


    public function getDoacoes(){
            $sql = "select * from doacao";

            $resultado = $this->conexao->query($sql);

            $doacoes = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $doacoesLista = [];

            foreach ($doacoes as $doacao){

                $doacao = new Doacao($doacoes['cod_doacao'], $doacoes['data_doacao'], $doacoes['data_cadastro'], $doacoes['cod_usu'], $doacoes['cod_status']);

                $doacoesLista[] = $doacao;

            }

            return $doacoesLista;
    }

    public function getDoacao(int $cod_doacao){

            $sql = "select * from doacao where cod_doacao = '{$cod_doacao}'";

            $resultado = $this->conexao->query();

            $doacao = $resultado->fetch();

            $objdoacao = new Doacao($doacao['cod_doacao'], $doacao['data_doacao'], $doacao['data_cadastro'], $doacao['cod_usu'], $doacao['cod_status']);

            return $objdoacao;
    }
}

    public function insertDoacao(Doacao $doacao){

            $sql = "insert into doacao(data_doacao, data_cadastro, cod_usu, cod_status)";
}