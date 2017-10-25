<?php

require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';

class Materia {
    private $con;
    private $objfc;
    
    private $idMateria;
    private $nomeMateria;
    private $statusMateria;
    private  $dataCadastro;






    public function __construct() {
        $this->con= new Conexao();
        $this->objfc = new Funcoes();
    }
    
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

     public function __get($atributo){
        return $this->$atributo;
    }
    
    
      public function querySeleciona($dados){
        try{
            $this->idMateria =  $dados;
            $cst = $this->con->conectar()->prepare("SELECT ID_MATERIA, NM_MATERIA, STATUS_MATERIA FROM `MATERIA` WHERE `ID_MATERIA` = :idMat;");
            $cst->bindParam(":idMat", $this->idMateria, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function querySelect(){
        try{
            $cst = $this->con->conectar()->prepare("SELECT * FROM `MATERIA`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }
    
    public function queryInsert($dados){
        try{
            $this->nomeMateria = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusMateria = $this->objfc->tratarCaracter($dados['status'], 1);
            $this->dataCadastro = $this->objfc->dataAtual(2);
            $cst = $this->con->conectar()->prepare("INSERT INTO `MATERIA` (`NM_MATERIA`, `STATUS_MATERIA`, `DATA_CADASTRO`) VALUES (:nome, :status, :dt );");
            $cst->bindParam(":nome", $this->nomeMateria, PDO::PARAM_STR);
             $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusMateria, PDO::PARAM_STR);
            if($cst->execute()){
                $cst = null;
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function queryUpdate($dados){
        try{
            $this->idMateria = intval($dados['id']);
            $this->nomeMateria = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->statusMateria = $dados['status'];
            $cst = $this->con->conectar()->prepare("UPDATE `MATERIA` SET  `NM_MATERIA` = :nome, `STATUS_MATERIA` = :status WHERE `ID_MATERIA` = :id;");
            $cst->bindParam(":id", $this->idMateria, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nomeMateria, PDO::PARAM_STR);
            $cst->bindParam(":status", $this->statusMateria, PDO::PARAM_STR);
            if($cst->execute()){
                $cst = null;
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function queryDelete($dados){
        try{
            $this->idMateria = intval($dados['id']);
            $cst = $this->con->conectar()->prepare("DELETE FROM `MATERIA` WHERE `ID_MATERIA` = :idMate;");
            $cst->bindParam(":idMate", $this->idMateria, PDO::PARAM_INT);
            if($cst->execute()){
                $cst = null;
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
     public function queryVerificar($dados) {
        try {
            $this->nomeTipoCompetencia = $this->objfc->tratarCaracter($dados['nome'], 1);
            $cst = $this->con->conectar()->prepare("SELECT * FROM `MATERIA` WHERE NM_MATERIA = :nome  ;");
            $cst->bindParam(":nome", $this->nomeTipoCompetencia, PDO::PARAM_STR);
            $cst->execute();
            if($cst->rowCount() == 0){
                $cst = null;
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }
        
               
   }
