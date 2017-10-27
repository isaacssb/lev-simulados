<?php

class Conexao{
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;
    
    public function __construct(){
        $this->servidor = "187.45.180.149";
        $this->banco = "levsimul_lev_banco";
        $this->usuario = "levsimul_lev";
        $this->senha = "36925asd";
    }
   
    public function conectar(){
        try{
            
            if(is_null(self::$pdo)){
                 
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
            }
            return self::$pdo;
             
        } catch (PDOException $ex) {
			echo $ex->getMessage();
                        echo "dasndasnsdajn";
        }
    }
    
}

?>
