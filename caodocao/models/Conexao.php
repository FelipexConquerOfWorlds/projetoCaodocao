<?php

class Conexao
{
        const HOST = "localhost";
        const DBNAME = "caodocao";
        const USUARIO = "root";
        const SENHA = "";


        public static $conexao = null;


        public static function getConexao(){
            try{ $conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME.";", self::USUARIO, self::SENHA);

                if (self::$conexao == null){
                    self::$conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USUARIO, self::SENHA);
                    self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }

                    return self::$conexao;

            }catch (PDOException $e){
                    die("Falha na conexao:".$e->getMessage());
            }
        }
}

