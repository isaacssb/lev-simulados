<?php

include_once "Conexao.class.php";
include_once "Funcoes.class.php";

class TipoCompetencia {

    private $con;
    private $objfc;
    private $idTipoCompetencia;
    private $nomeTipoCompetencia;
    private $statusCompetencia;
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
            $this->idTipoCompetencia = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT ID_COMPETENCIA, NM_COMPETENCIA, STATUS_COMPETENCIA, DATA_CADASTRO FROM `TIPO_COMPETENCIA` WHERE `ID_COMPETENCIA` = :idTIPOCOMPETENCIA;");
            $cst->bindParam(":idTIPOCOMPETENCIA", $this->idTipoCompetencia, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelect() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT `ID_COMPETENCIA`, `NM_COMPETENCIA`, `STATUS_COMPETENCIA`, `DATA_CADASTRO` FROM `TIPO_COMPETENCIA`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function queryInsert($dados) {
        try {
            $this->nomeTipoCompetencia = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusCompetencia = $dados['status'];
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `TIPO_COMPETENCIA` (`NM_COMPETENCIA`, `STATUS_COMPETENCIA`, `DATA_CADASTRO`) VALUES (:nome,:status,:dt);");
            $cst->bindParam(":nome", $this->nomeTipoCompetencia, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusCompetencia, PDO::PARAM_STR);
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
            $this->idTipoCompetencia = intval($dados['id']);
            $this->nomeTipoCompetencia = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusCompetencia = $dados['status'];
            $cst = $this->con->conectar()->prepare("UPDATE `TIPO_COMPETENCIA` SET  `NM_COMPETENCIA` = :nome, `STATUS_COMPETENCIA` = :status WHERE `ID_COMPETENCIA` = :id;");
            $cst->bindParam(":id", $this->idTipoCompetencia, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomeTipoCompetencia, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusCompetencia, PDO::PARAM_STR);
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
            $this->idTipoCompetencia = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("DELETE FROM `TIPO_COMPETENCIA` WHERE `ID_COMPETENCIA` = :id;");
            $cst->bindParam(":id", $this->idTipoCompetencia, PDO::PARAM_INT);
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
            $this->nomeTipoCompetencia = $this->objfc->tratarCaracter($dados['nome'], 1);
            $cst = $this->con->conectar()->prepare("SELECT * FROM `TIPO_COMPETENCIA` WHERE NM_COMPETENCIA = :nome  ;");
            $cst->bindParam(":nome", $this->nomeTipoCompetencia, PDO::PARAM_STR);
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
