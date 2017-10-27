<?php

include_once "Conexao.class.php";
include_once "Funcoes.class.php";

class Pessoa {

    private $con;
    private $objfc;
    private $idPessoa; //ID_PESSOA
    private $nomePessoa; //NM_PESSOA
    private $senhaPessoa; //SENHA_PESSOA
    private $emailPessoa; //EMAIL_PESSOA
    private $escolaridadePessoa; //ESCOLARIDADE_PESSOA
    private $tipoPessoa; // TIPO_PESSOA
    private $cidadePessoa; //CIDADE_PESSOA
    private $dataCadastro; //DATA_CADASTRO

    public function __construct() {
        $this->con = new Conexao();
        $this->objfc = new Funcoes();
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    //ALTERAR SQL
    public function querySeleciona($dado) {
        try {
            $this->idPessoa = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT ID_PESSOA, NM_PESSOA,EMAIL_PESSOA, ESCOLARIDADE_PESSOA, TIPO_PESSOA, CIDADE_PESSOA, DATA_CADASTRO FROM `TIPO_COMPETENCIA` WHERE `ID_PESSOA` = :id;");
            $cst->bindParam(":id", $this->idPessoa, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelectRedator() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_PESSOA, NM_PESSOA,EMAIL_PESSOA, ESCOLARIDADE_PESSOA, TIPO_PESSOA, CIDADE_PESSOA, DATA_CADASTRO FROM `PESSOA` WHERE TIPO_PESSOA=3;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function querySelectAluno() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_PESSOA, NM_PESSOA,EMAIL_PESSOA, ESCOLARIDADE_PESSOA, TIPO_PESSOA, CIDADE_PESSOA, DATA_CADASTRO FROM `PESSOA` WHERE TIPO_PESSOA=1;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function querySelectProfessor() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_PESSOA, NM_PESSOA,EMAIL_PESSOA, ESCOLARIDADE_PESSOA, TIPO_PESSOA, CIDADE_PESSOA, DATA_CADASTRO FROM `PESSOA` WHERE TIPO_PESSOA=2;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function queryInsertRedator($dados) {
        try {
            $this->nomePessoa = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->senhaPessoa = $this->objfc->base64($dados['senha'], 1);
            $this->emailPessoa = $dados['email'];

            //$this->escolaridadePessoa = $this->objfc->tratarCaracter($dados['escolaridade'], 1);
            //$this->tipoPessoa = $dados['tipoPessoa'];
            //$this->cidadePessoa = $this->objfc->tratarCaracter($dados['cidade'], 1);
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `PESSOA` (NM_PESSOA, EMAIL_PESSOA,SENHA_PESSOAS, TIPO_PESSOA, DATA_CADASTRO) VALUES (:nome,:email,:senha,3,:dt);");
            $cst->bindParam(":nome", $this->nomePessoa, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->emailPessoa, PDO::PARAM_STR);
            //$cst->bindParam(":escolaridade", $this->escolaridadePessoa, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senhaPessoa, PDO::PARAM_STR);
            //$cst->bindParam(":cidade", $this->cidadePessoa, PDO::PARAM_STR);
            $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    
   

    public function queryInsertAluno($dados) {
        try {
            $this->nomePessoa = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->senhaPessoa = $this->objfc->base64($dados['senha'], 1);
            $this->emailPessoa = $dados['email'];
            $this->escolaridadePessoa = $this->objfc->tratarCaracter($dados['escolaridade'], 1);
            $this->cidadePessoa = $this->objfc->tratarCaracter($dados['cidade'], 1);
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `PESSOA` (NM_PESSOA, EMAIL_PESSOA,SENHA_PESSOAS,ESCOLARIDADE_PESSOA,CIDADE_PESSOA,TIPO_PESSOA, DATA_CADASTRO) VALUES (:nome,:email,:senha,:escolaridade,:cidade,1,:dt);");
            $cst->bindParam(":nome", $this->nomePessoa, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->emailPessoa, PDO::PARAM_STR);
            $cst->bindParam(":escolaridade", $this->escolaridadePessoa, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senhaPessoa, PDO::PARAM_STR);
            $cst->bindParam(":cidade", $this->cidadePessoa, PDO::PARAM_STR);
            $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    
    public function queryInsertProfessor($dados) {
        try {
            $this->nomePessoa = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->senhaPessoa = $this->objfc->base64($dados['senha'], 1);
            $this->emailPessoa = $dados['email'];
            $this->escolaridadePessoa = $this->objfc->tratarCaracter($dados['escolaridade'], 1);
            $this->cidadePessoa = $this->objfc->tratarCaracter($dados['cidade'], 1);
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `PESSOA` (NM_PESSOA, EMAIL_PESSOA,SENHA_PESSOAS,ESCOLARIDADE_PESSOA,CIDADE_PESSOA,TIPO_PESSOA, DATA_CADASTRO) VALUES (:nome,:email,:senha,:escolaridade,:cidade,2,:dt);");
            $cst->bindParam(":nome", $this->nomePessoa, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->emailPessoa, PDO::PARAM_STR);
            $cst->bindParam(":escolaridade", $this->escolaridadePessoa, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senhaPessoa, PDO::PARAM_STR);
            $cst->bindParam(":cidade", $this->cidadePessoa, PDO::PARAM_STR);
            $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    
    public function queryUpdate($dados) {
        try {
            $this->idPessoa = intval($dados['id']);
            $this->nomePessoa = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->senhaPessoa = $this->objfc->base64($dados['senha'], 1);
            $this->emailPessoa = $dados['email'];
            //$this->escolaridadePessoa = $this->objfc->tratarCaracter($dados['escolaridade'], 1);
            //$this->tipoPessoa = $dados['tipoPessoa'];
            //$this->cidadePessoa = $this->objfc->tratarCaracter($dados['cidade'], 1);
            $cst = $this->con->conectar()->prepare("UPDATE `PESSOA` SET  `NM_PESSOA` = :nome,`EMAIL_PESSOA` = :email, SENHA_PESSOAS = :senha  WHERE `ID_PESSOA` = :id;");
            $cst->bindParam(":id", $this->idPessoa, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomePessoa, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->emailPessoa, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senhaPessoa, PDO::PARAM_STR);
            //$cst->bindParam(":escolaridade", $this->escolaridadePessoa, PDO::PARAM_STR);
            //$cst->bindParam(":tipo", $this->tipoPessoa, PDO::PARAM_INT);
            //$cst->bindParam(":cidade", $this->cidadePessoa, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
        public function queryUpdateProfessor($dados) {
        try {
            $this->idPessoa = intval($dados['id']);
            $this->nomePessoa = $this->objfc->tratarCaracter($dados['nome'], 1);
           
            $this->emailPessoa = $dados['email'];
            $this->escolaridadePessoa = $this->objfc->tratarCaracter($dados['escolaridade'], 1);
           
            $this->cidadePessoa = $this->objfc->tratarCaracter($dados['cidade'], 1);
            $cst = $this->con->conectar()->prepare("UPDATE `PESSOA` SET  `NM_PESSOA` = :nome,`EMAIL_PESSOA` = :email, ESCOLARIDADE_PESSOA = :escolaridade, CIDADE_PESSOA = :cidade  WHERE `ID_PESSOA` = :id;");
            $cst->bindParam(":id", $this->idPessoa, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomePessoa, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->emailPessoa, PDO::PARAM_STR);
            $cst->bindParam(":escolaridade", $this->escolaridadePessoa, PDO::PARAM_STR);
          
            $cst->bindParam(":cidade", $this->cidadePessoa, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function queryDelete($dados) {
        try {
            $this->idPessoa = $dados['id'];
            $cst = $this->con->conectar()->prepare("DELETE FROM `PESSOA` WHERE `ID_PESSOA` = :id;");
            $cst->bindParam(":id", $this->idPessoa, PDO::PARAM_INT);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }

    public function queryVerificarEmail($dados) {
        try {
            $this->emailPessoa = $this->objfc->tratarCaracter($dados['email'], 1);
            $cst = $this->con->conectar()->prepare("SELECT * FROM `PESSOA` WHERE EMAIL_PESSOA = :email  ;");
            $cst->bindParam(":email", $this->emailPessoa, PDO::PARAM_STR);
            $cst->execute();
            if ($cst->rowCount() == 0) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

}
