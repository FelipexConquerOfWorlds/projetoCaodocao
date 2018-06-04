<?php


class Usuario
{
        private $nome;
        private $email;
        private $telefone;
        private $senha;
        private $cod_usu;
        private $cnpj;
        private $cod_cida;


            public function __construct($nome, $email, $telefone, $senha, $cod_cida, $cnpj, $cod_usu)
            {
                $this->nome = $nome;
                $this->email = $email;
                $this->telefone = $telefone;
                $this->senha = $senha;
                $this->cod_usu = $cod_usu;
                $this->cnpj = $cnpj;
                $this->cod_cida = $cod_cida;

            }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
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

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getCodCida()
    {
        return $this->cod_cida;
    }

    /**
     * @param mixed $cod_cida
     */
    public function setCodCida($cod_cida)
    {
        $this->cod_cida = $cod_cida;
    }

}