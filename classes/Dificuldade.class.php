<?php

include_once "Conexao.class.php";
include_once "Funcoes.class.php";

class Dificuldade {

    private $con;
    private $objfc;
    private $idDificuldade;
    private $nomeDificuldade;
    private $statusDificuldade;
    private $dataCadastro;

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

    public function querySeleciona($dado) {
        try {
            $this->idDificuldade = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT ID_DIFICULDADE, NM_DIFICULDADE, STATUS_DIFICULDADE, DATA_CADASTRO FROM `DIFICULDADE_QUESTAO` WHERE `ID_DIFICULDADE` = :id;");
            $cst->bindParam(":id", $this->idDificuldade, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelect() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT `ID_DIFICULDADE`, `NM_DIFICULDADE`, `STATUS_DIFICULDADE`, `DATA_CADASTRO` FROM `DIFICULDADE_QUESTAO`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function queryInsert($dados) {
        try {
            $this->nomeDificuldade= $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusDificuldade= $dados['status'];
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `DIFICULDADE_QUESTAO` (`NM_DIFICULDADE`, `STATUS_DIFICULDADE`, `DATA_CADASTRO`) VALUES (:nome,:status,:dt);");
            $cst->bindParam(":nome", $this->nomeDificuldade, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusDificuldade, PDO::PARAM_STR);
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
            $this->idDificuldade = intval($dados['id']);
            $this->nomeDificuldade = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusDificuldade = $dados['status'];
            $cst = $this->con->conectar()->prepare("UPDATE `DIFICULDADE_QUESTAO` SET  `NM_DIFICULDADE` = :nome, `STATUS_DIFICULDADE` = :status WHERE `ID_DIFICULDADE` = :id;");
            $cst->bindParam(":id", $this->idDificuldade, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomeDificuldade, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusDificuldade, PDO::PARAM_STR);
            if ($cst->execute()) {
                $cst = null;
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
            $this->idDificuldade = intval($dados['id']);
            $cst = $this->con->conectar()->prepare("DELETE FROM `DIFICULDADE_QUESTAO` WHERE `ID_DIFICULDADE` = :id;");
            $cst->bindParam(":id", $this->idDificuldade, PDO::PARAM_INT);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
        public function queryVerificar($dados) {
        try {
            $this->nomeDificuldade = $this->objfc->tratarCaracter($dados['nome'], 1);
            $cst = $this->con->conectar()->prepare("SELECT * FROM `DIFICULDADE_QUESTAO` WHERE NM_DIFICULDADE = :nome  ;");
            $cst->bindParam(":nome", $this->nomeDificuldade, PDO::PARAM_STR);
            $cst->execute();
            if($cst->rowCount() == 0){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }


}
