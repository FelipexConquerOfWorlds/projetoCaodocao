<?php


class Usuario
{
        private $nome;
        private $email;
        private $telefone;
        private $senha;
        private $cod_usu;
        private $cnpj;
        private $cod_esta;
        private $cd_tipuser;
        private $fotoperfil;

            public function __construct($nome = null, $email = null, $cnpj = null, $senha = null, $cod_esta = null, $telefone = null, $cod_usu = null , $cd_tipuser = 2, $fotoperfil = '../views/img/portfolio/fotoperfil.jpg')
            {
                $this->nome = $nome;
                $this->email = $email;
                $this->telefone = $telefone;
                $this->senha = $senha;
                $this->cod_usu = $cod_usu;
                $this->cnpj = $cnpj;
                $this->cod_esta = $cod_esta;
                $this->cd_tipuser = $cd_tipuser;
                $this->fotoperfil = $fotoperfil;
            }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return null
     */
    public function getFotoperfil()
    {
        return $this->fotoperfil;
    }

    /**
     * @param null $fotoperfil
     */
    public function setFotoperfil($fotoperfil): void
    {
        $this->fotoperfil = $fotoperfil;
    }

    /**
     * @param mixed $nomeusuarios
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCdTipuser()
    {
        return $this->cd_tipuser;
    }

    /**
     * @param mixed $cd_tipuser
     */
    public function setCdTipuser($cd_tipuser)
    {
        $this->cd_tipuser = $cd_tipuser;
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
    public function getCodEsta()
    {
        return $this->cod_esta;
    }

    /**
     * @param mixed $cod_cida
     */
    public function setCodEsta($cod_esta)
    {
        $this->cod_esta = $cod_esta;
    }

}