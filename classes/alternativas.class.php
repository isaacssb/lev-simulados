<?php

require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';

class alternativas {

    private $con;
    private $objfc;
    private $idAlternativa;
    
    private $alternativa1Certo;
    private $alternativa2;
    private $alternativa3;
    private $alternativa4;
    private $alternativa5;

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
    
     public function queryInsert($dados){
        try{
            $this->alternativa1Certo = $this->objfc->tratarCaracter($dados['altercorreta'], 1);
            $this->alternativa2 = $this->objfc->tratarCaracter($dados['alter2'], 1);
            $this->alternativa3 = $this->objfc->tratarCaracter($dados['alter3'], 1);
            $this->alternativa4 = $this->objfc->tratarCaracter($dados['alter4'], 1);
            $this->alternativa5 = $this->objfc->tratarCaracter($dados['alter5'], 1);
            $cst = $this->con->conectar()->prepare("INSERT INTO `ALTERNATIVA_QUESTAO` (`ALTERNATIVA_CORRETA`, `ALTERNATIVA2`, `ALTERNATIVA3`, `ALTERNATIVA4`, `ALTERNATIVA5`) VALUES( :altercorreta, :alter2, :alter3, :alter4, :alter5);");
            $cst->bindParam(":altercorreta", $this->alternativa1Certo, PDO::PARAM_STR);
            $cst->bindParam(":alter2", $this->alternativa2, PDO::PARAM_STR);
            $cst->bindParam(":alter3", $this->alternativa3, PDO::PARAM_STR);
            $cst->bindParam(":alter4", $this->alternativa4, PDO::PARAM_STR);
            $cst->bindParam(":alter5", $this->alternativa5, PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
}