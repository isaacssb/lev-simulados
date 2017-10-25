<?php
require_once 'classes/Materia.class.php';
require_once 'classes/Funcoes.class.php';

$objtpc = new Materia();
$objFcs = new Funcoes();

if (isset($_POST['btnCadastrar'])) {
    if ($objtpc->queryVerificar($_POST) == 'ok') {
        if ($objtpc->queryInsert($_POST) == 'ok') {
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="" class="close" data-dismiss="alert">&times</a>
                    Materia cadastrada com sucesso!
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="" class="close" data-dismiss="alert">&times</a>
                    Erro ao cadastrar
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="" class="close" data-dismiss="alert">&times</a>
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
                <label>Nome da Materia: </label><br>
                <input type="text" name="nome" required="required" value="" class="form-control "><br>
                <label>Status: </label><br>
                <select name="status" class="form-control">
                    <option value="ATIVADO">ATIVADO</option> 
                    <option value="DESATIVADO">DESATIVADO</option> 
                </select>

                <br>
                <input type="submit" class="btn btn-primary form-control" value="Cadastrar" name="btnCadastrar">
                <input type="hidden" name="func" value="">
            </form>
        </div>
    </div>
</div>