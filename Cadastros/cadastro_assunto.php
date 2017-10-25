<?php
require_once 'classes/Assunto.class.php';
require_once 'classes/Funcoes.class.php';

$objtpc = new Assunto();
$objFcs = new Funcoes();

if (isset($_POST['btnCadastrar'])) {
    if ($objtpc->queryVerificar($_POST) == 'ok') {
        if ($objtpc->queryInsert($_POST) == 'ok') {
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="" class="close" data-dismiss="alert">&times</a>
                    Cadastro Competencia com sucesso!
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="" class="close" data-dismiss="alert">&times</a>
                    Cadastro Competencia com sucesso!
                </div>
            </div>
            <?php
        }
    } else {
          ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="" class="close" data-dismiss="alert">&times</a>
                Assunto já cadastrado !
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
                <label>Nome do Assunto: </label><br>
                <input type="text" name="nome" required="required" value="" class="form-control "><br>
                <label>Informações sobre o Assunto: </label><br>
                <textarea class="form-control"  NAME="dscr" ROWS=3 COLS=32></textarea>
                <label>Materia: </label><br>
                <select name="materia" class="form-control">

                    <?php foreach ($objtpc->SelectNome() as $rst) { ?>
                        <option value="<?= $rst['ID_MATERIA']; ?>"><?= $objFcs->tratarCaracter($rst['NM_MATERIA'], 2) ?></option>
                    <?php } ?>
                </select>

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
