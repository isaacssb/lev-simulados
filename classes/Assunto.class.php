<?php

require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';

class Assunto {

    private $con;
    private $objfc;
    private $idAssunto;
    private $idMateria;
    private $nomeAssunto;
    private $dscrAssunto;
    private $statusAssunto;
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
            $this->idMateria = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT ID_MATERIA, NM_MATERIA, STATUS_MATERIA FROM `MATERIA` WHERE `ID_MATERIA` = :idMat;");
            $cst->bindParam(":idFunc", $this->idMateria, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelect() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT `ID_MATERIA`, NM_MATERIA, STATUS_MATERIA FROM `MATERIA`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function queryInsert($dados) {
        try {
            $this->nomeMateria = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusMateria = $this->objfc->tratarCaracter($dados['status'], 1);
            $this->dscrAssunto =$this->objfc->tratarCaracter($dados['dscr'], 1);
            $this->idMateria = $dados['materia'];
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `ASSUNTO` (`NM_ASSUNTO`,`ID_MATERIA`, `DSCR_ASSUNTO` ,`STATUS_ASSUNTO`, `DATA_CADASTRO`) VALUES (:nome,:idmateria,:dscr , :status, :dt );");
            $cst->bindParam(":nome", $this->nomeMateria, PDO::PARAM_STR);
            $cst->bindParam(":idmateria", $this->idMateria, PDO::PARAM_INT);
            $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            $cst->bindParam(":dscr", $this->dscrAssunto, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusMateria, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
                $cst = null;
            } else {
                $cst = null;
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function queryUpdate($dados) {
        try {
            $this->idMateria = $this->objfc->base64($dados['materia'], 2);
            $this->nomeMateria = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusMateria = $dados['status'];
            $cst = $this->con->conectar()->prepare("UPDATE `MATERIA` SET  `NM_MATERIA` = :nome, `STATUS_MATERIA` = :status WHERE `ID_MATERIA` = :materia;");
            $cst->bindParam(":materia", $this->idMateria, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomeMateria, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusMateria, PDO::PARAM_STR);
            if ($cst->execute()) {
                $cst = null;
                return 'ok';
            } else {
                $cst = null;
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function queryDelete($dado) {
        try {
            $this->idMateria = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("DELETE FROM `MATERIA` WHERE `ID_MATERIA` = :idMate;");
            $cst->bindParam(":idMate", $this->idMateria, PDO::PARAM_INT);
            if ($cst->execute()) {
                $cst = null;
                return 'ok';
            } else {
                $cst = null;
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }

    public function SelectNome() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_MATERIA, NM_MATERIA FROM `MATERIA`;");
            $cst->execute();
            return $cst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
    
     public function queryVerificar($dados) {
        try {
            $this->nomeTipoCompetencia = $this->objfc->tratarCaracter($dados['nome'], 1);
            $cst = $this->con->conectar()->prepare("SELECT * FROM `ASSUNTO` WHERE NM_ASSUNTO = :nome  ;");
            $cst->bindParam(":nome", $this->nomeTipoCompetencia, PDO::PARAM_STR);
            $cst->execute();
            if($cst->rowCount() == 0){
                $cst = null;
                return 'ok';
            }else{
                $cst = null;
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

}
