<?php

require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';
require_once 'alternativas.class.php';

class Questoes {

    private $con;
    private $objfc;
    private $alternativas;
    private $idQuestao;
    private $idCompetencia;
    private $idDificuldade;
    private $idAssunto;
    private $perguntaQuestao;
    private $anoQuestao;
    private $semestreQuestao;
    private $statusQuestao;
    private $dataCadastro;
    
    
    public function __construct() {
        $this->con = new Conexao();
        $this->objfc = new Funcoes();
        $this->alternativas = new alternativas();
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
            $this->perguntaQuestao = $this->objfc->tratarCaracter($dados['dscr'], 1); 
            $this->idDificuldade = $dados['dificuldade'];
            $this->idCompetencia = $dados['competencia'];
            $this->idAssunto = $dados['assunto'];
            $this->semestreQuestao = $dados['assunto'];$this->anoQuestao = $dados['ano'];
            $this->statusQuestao = $this->objfc->tratarCaracter($dados['status'], 1);
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `QUESTAO` (`PERGUNTA_QUESTAO`,`ID_DIFICULDADE`, `ID_COMPETENCIA`,`ID_ASSUNTO`,`ANO_QUESTAO`,`SEMESTRE_QUESTAO`  ,`STATUS_QUESTAO`, `DATA_CADASTRO`)VALUES (:pergunta,:iddificuldade,:idcompetencia,:idassunto,:ano,:semestre, :status, :dt );");
            $cst->bindParam(":pergunta", $this->perguntaQuestao, PDO::PARAM_STR);
            $cst->bindParam(":iddificuldade", $this->idDificuldade, PDO::PARAM_INT);
            $cst->bindParam(":idcompetencia", $this->idCompetencia, PDO::PARAM_INT);
            $cst->bindParam(":idassunto", $this->idAssunto, PDO::PARAM_INT); 
            $cst->bindParam(":ano", $this->anoQuestao, PDO::PARAM_INT);
            $cst->bindParam(":semestre", $this->semestreQuestao, PDO::PARAM_INT); 
            $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);  
            $cst->bindParam(":status", $this->statusQuestao, PDO::PARAM_STR);
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
            $this->idMateria = $this->objfc->base64($dados['materia'], 2);
            $this->nomeMateria = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusMateria = $dados['status'];
            $cst = $this->con->conectar()->prepare("UPDATE `MATERIA` SET  `NM_MATERIA` = :nome, `STATUS_MATERIA` = :status WHERE `ID_MATERIA` = :materia;");
            $cst->bindParam(":materia", $this->idMateria, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomeMateria, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusMateria, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
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
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }

    public function SelectNomeDificuldade() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_DIFICULDADE, NM_DIFICULDADE FROM `DIFICULDADE_QUESTAO` WHERE STATUS_DIFICULDADE = 'ATIVADO';");
            $cst->execute();
            return $cst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
    
    public function SelectNomeTpCompetencia() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_COMPETENCIA, NM_COMPETENCIA FROM `TIPO_COMPETENCIA` WHERE STATUS_COMPETENCIA = 'ATIVADO' ;");
            $cst->execute();
            return $cst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
    
  
    
    public function SelectNomeMateria() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_MATERIA, NM_MATERIA FROM `MATERIA`;");
            $cst->execute();
            return $cst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
    public function SelectNomeAssunto() {
        try {
            $cst = $this->con->conectar()->prepare("SELECT ID_ASSUNTO, NM_ASSUNTO FROM `ASSUNTO`;");
            $cst->execute();
            return $cst->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }
    }

}
