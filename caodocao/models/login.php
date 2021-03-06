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
                $this->conexao = conexao::getConexao();

                $sql = "select count(email) as qtd from usuario where email = '{$email}'";

                $resultado = $this->conexao->query($sql);

                $dados = $resultado->fetch(PDO::FETCH_ASSOC);

                $erro = false;

                        if ($dados['qtd'] != '1'){
                            return $erro;

                        } else {
                                    $sql = "select * from usuario where senha = '{$senha}' and email = '{$email}'";
                                    $resulSenha = $this->conexao->query($sql);
                                    $usuario = $resulSenha->fetch(PDO::FETCH_ASSOC);

                                            if (empty($resulSenha)) {
                                                return $erro;

                                            } else {


                                                $objUsu = new Usuario($usuario['nome'], $usuario['email'], $usuario['cod_usu'], $usuario['cnpj'], $usuario['senha'], $usuario['telefone'], $usuario['cod_esta'], $usuario['cd_tipuser']);

//

                                                $_SESSION['nome'] = $objUsu->getNome();
                                                $_SESSION['email'] = $objUsu->getEmail();
                                                $_SESSION['cod_usu'] = $objUsu->getCodUsu();
                                                $_SESSION['cnpj'] = $objUsu->getCnpj();
                                                $_SESSION['senha'] = $objUsu->getSenha();
                                                $_SESSION['telefone'] = $objUsu->getTelefone();
                                                $_SESSION['cod_cida'] = $objUsu->getCodEsta();
                                                $_SESSION['cd_tipuser'] = $objUsu->getCdTipuser();
                                                 return $objUsu;


                                            }

                                    }
        }


        public function tipouser($email){
            $this-> conexao = conexao::getConexao();

            $sql = "select cd_tipuser from tip_user, usuario where email = '{$email}'";

            $resultado = $this->conexao->query($sql);

            $tip_usuario = 0;

            if ($resultado == 1){
                $tip_usuario = 'admin_master';
            } elseif($resultado == 2){
                $tip_usuario = 'admin';
            } elseif ($tip_usuario == 3){
                $tip_usuario = 'user';
            }
            return $tip_usuario;
        }



}

