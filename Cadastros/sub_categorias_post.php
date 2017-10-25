<?php include_once("../classes/Conexao.class.php");
   
        $con = new Conexao();
        
    
	$id_categoria = $_REQUEST['id_categoria'];
	
        $resultado_sub_cat = $con->conectar()->prepare("SELECT * FROM ASSUNTO WHERE ID_MATERIA = $id_categoria ORDER BY NM_ASSUNTO");
        
        $resultado_sub_cat->execute();
	
	while ($row_sub_cat = $resultado_sub_cat->fetchAll(PDO::FETCH_ASSOC)) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_sub_categoria' => utf8_encode($row_sub_cat['nome_sub_categoria']),
		);
	}
	
	 echo(json_encode($sub_categorias_post));
         
        
     
