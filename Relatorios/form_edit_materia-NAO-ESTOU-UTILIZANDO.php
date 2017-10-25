<?php
require_once 'classes/Materia.class.php';
require_once 'classes/Funcoes.class.php';

$objtpc = new Materia();
$objFcs = new Funcoes();


if (empty($_GET['id'])){
	echo "ID para alteração não definido";
    exit;
}

$result_pesquisa = $objtpc->querySeleciona($_GET['id']);



if (isset($_POST['btnAlterar'])) {
    if ($objtpc->queryVerificar($_POST) == 'ok') {
        if ($objtpc->queryUpdate($_POST) == 'ok') {
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="index.php?op=relatorio_materia" class="close" data-dismiss="alert">&times</a>
                    Alteração realizada com sucesso!
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="index.php?op=relatorio_materia" class="close" data-dismiss="alert">&times</a>
                    Erro no Cadastro
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_materia" class="close" data-dismiss="alert">&times</a>
                Matéria já cadastrado !
            </div>
        </div>
        <?php
    }
}



?>

<div class="row">
    <div class="col-md-3">
        <div id="formulario">
            <form action="" method="POST">
                <label>ID: </label><br>         
                 <!-- INSERI NO INPUT O ID DA MATERIA PARA REALIZAR ALTERAÇÃO  -->
                <input type="number" name="txtId" required="required" readonly value="<?php echo $objFcs->tratarCaracter($result_pesquisa['ID_MATERIA'], 2) ?>" class="form-control "><br>
                
                
                <label>Nome da Materia: </label><br>         
                 <!-- INSERI NO INPUT O NOME DA MATERIA PARA REALIZAR ALTERAÇÃO  -->
                <input type="text" name="nome" required="required" value="<?php echo $objFcs->tratarCaracter($result_pesquisa['NM_MATERIA'], 2) ?>" class="form-control "><br>
                
                
                <label>Status: </label><br>
                <select name="status" class="form-control">
                    <option value="ATIVADO">ATIVADO</option> 
                    <option value="DESATIVADO">DESATIVADO</option> 
                </select>

                <br>
                <input type="submit" class="btn btn-primary form-control"  value="Alterar" name="btnAlterar">
                <br>
                <a href="index.php?op=relatorio_materia"><button type="button" class="btn  btn-danger form-control">Voltar</button></a></p>
            </form> 
        </div>
    </div>
</div>