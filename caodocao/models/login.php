<?php
    require_once "Usuario.php";
    require_once "CrudUsuario.php";
    require_once "Conexao.php";
class login
{
        public function CadastroUser($nome, $email, $telefone, $senha, $cidade, $cnpj){
                $usuario = new Usuario($nome, $email, $telefone, $senha, $cidade, $cnpj);

                $cadastro = new CrudUsuario();

                $cadastro->CadastrarUsuario($usuario);
        }

        public function verificarCadastro($email, $senha){
                $this->conexao = DBConnection::getConexao;

                $sql = "select count(email) from usuario where email = '{$email}'";

                $resultado = $this->conexao->query($sql);

                $sucesso = false;

                        if ($resultado != '1'){
                            return $sucesso;

                        } else {
                                    $sql = "select count(senha) from usuario where senha = '{$senha}'";
                                    $resulSenha = $this->conexao->query($sql);

                                            if ($resulSenha != '1') {
                                                return $sucesso;

                                            } else {

                                                $sucesso = true;
                                                return $sucesso;

                                            }

                                    }
        }


}

