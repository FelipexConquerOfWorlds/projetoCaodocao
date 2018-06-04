<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 08/05/18
 * Time: 08:49
 */

class Animal
{
    private $nome;
    private $datanascimento;
    private $cod_animal;
    private $foto_perfil;
    private $cod_raca;
    private $cod_doacao;
    private $cod_usu;


            public function __construct($nome, $datanascimento, $foto_perfil, $cod_raca, $cod_doacao, $cod_usu, $cod_animal)
            {
                $this->nome = $nome;
                $this->datanascimento = $datanascimento;
                $this->cod_animal = $cod_animal;
                $this->foto_perfil = $foto_perfil;
                $this->cod_raca = $cod_raca;
                $this->cod_doacao = $cod_doacao;
                $this->cod_usu = $cod_usu;
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
    public function getDatanascimento()
    {
        return $this->datanascimento;
    }

    /**
     * @param mixed $datanascimento
     */
    public function setDatanascimento($datanascimento)
    {
        $this->datanascimento = $datanascimento;
    }

    /**
     * @return mixed
     */
    public function getCodAnimal()
    {
        return $this->cod_animal;
    }

    /**
     * @param mixed $cod_animal
     */
    public function setCodAnimal($cod_animal)
    {
        $this->cod_animal = $cod_animal;
    }

    /**
     * @return mixed
     */
    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }

    /**
     * @param mixed $foto_perfil
     */
    public function setFotoPerfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;
    }

    /**
     * @return mixed
     */
    public function getCodRaca()
    {
        return $this->cod_raca;
    }

    /**
     * @param mixed $cod_raca
     */
    public function setCodRaca($cod_raca)
    {
        $this->cod_raca = $cod_raca;
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