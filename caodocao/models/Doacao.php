<?php

class Doacao
{
    private $cod_doacao;
    private $data_cadastro;
    private $data_doacao;
    private $cod_status;
    private $cod_usu;

        public function __construct($cod_usu, $cod_status, $data_doacao= null)
        {
            $this->data_doacao = $data_doacao;
            $this->cod_status = $cod_status;
            $this->cod_usu = $cod_usu;
        }

    /**
     * @return mixed
     */
    public function getCodDoacao()
    {
        return $this->cod_doacao;
    }

    /**
     * @param mixed $cod_doacao
     */
    public function setCodDoacao($cod_doacao)
    {
        $this->cod_doacao = $cod_doacao;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param mixed $data_cadastro
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    /**
     * @return mixed
     */
    public function getDataDoacao()
    {
        return $this->data_doacao;
    }

    /**
     * @param mixed $data_doacao
     */
    public function setDataDoacao($data_doacao)
    {
        $this->data_doacao = $data_doacao;
    }

    /**
     * @return mixed
     */
    public function getCodStatus()
    {
        return $this->cod_status;
    }

    /**
     * @param mixed $cod_status
     */
    public function setCodStatus($cod_status)
    {
        $this->cod_status = $cod_status;
    }

    /**
     * @return mixed
     */
    public function getCodUsu()
    {
        return $this->cod_usu;
    }

    /**
     * @param mixed $cod_usu
     */
    public function setCodUsu($cod_usu)
    {
        $this->cod_usu = $cod_usu;
    }

}