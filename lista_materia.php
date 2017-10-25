<?php
require_once 'classes/Materia.class.php';
require_once 'classes/Funcoes.class.php';

$objFcn = new Materia();
$objFcs = new Funcoes();


if(isset($_POST['btAlterar'])){
    if($objFcn->queryUpdate($_POST) == 'ok'){
        header('location: ?acao=edit&func='.$objFcs->base64($_POST['func'],1));
    }else{
        echo '<script type="text/javascript">alert("Erro em alterar");</script>';
    }
}


if(isset($_GET['acao'])){
    switch($_GET['acao']){
        case 'edit': $func = $objFcn->querySeleciona($_GET['func']); break;
        case 'delet':
            if($objFcn->queryDelete($_GET['func']) == 'ok'){
         
            }else{
                echo '<script type="text/javascript">alert("Erro em deletar");</script>';
            }
                break;
    }
}
?>

<div id="lista">
    <?php foreach($objFcn->querySelect() as $resultado){ ?>
    <div class="funcionario">
        <div class="nome"><?=$objFcs->tratarCaracter($resultado['nomeMateria'], 2)?></div>
        <div class="editar"><a href="?acao=edit&func=<?=$resultado['idMateria']?>" title="Editar dados"><img src="img/ico-editar.png" width="16" height="16" alt="Editar"></a></div>
        <div class="excluir"><a href="?acao=delet&func=<?=$resultado['idMateria']?>" title="Excluir esse dado"><img src="img/ico-excluir.png" width="16" height="16" alt="Excluir"></a></div>
    </div>
    <?php } ?>
</div>


