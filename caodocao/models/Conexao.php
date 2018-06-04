<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 08/05/18
 * Time: 09:22
 */

class Conexao
{
        const HOST = "localhost";
        const DBNAME = "caodocao";
        const USUARIO = "admin";
        const SENHA = "admin";


        public static $conexao = null;


        public static function getConexao(){
            try{
                if (self::$conexao == null){
                    self::$conexao = new PDO("mysql:host=".self::HOST."dbname=".self::DBNAME, self::USUARIO, self::SENHA);
                    self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }

                    return self::$conexao;

            }catch (PDOException $e){
                    die("Falha na conexao:".$e->getMessage());

            }
            return $conexao;
        }
}