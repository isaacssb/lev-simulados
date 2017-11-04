<?php
require_once 'classes/Questoes.class.php';
require_once 'classes/Funcoes.class.php';
require_once 'classes/alternativas.class.php';
$objalter = new alternativas();
$objtpc = new Questoes();
$objFcs = new Funcoes();


if (isset($_POST['btnCadastrar'])) {

    if ($objalter->queryInsert($_POST) == 'ok') {
        if($objtpc->queryInsert($_POST) == 'ok' ){
        ?>
        <div class="message">
            <div class="alert alert-success">
                <a href="" class="close" data-dismiss="alert">&times</a>
                Cadastro Realizado com sucesso!
            </div>
        </div>
        <?php
    }else{
         ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="" class="close" data-dismiss="alert">&times</a>
                Erro ao cadastrar alternativa
            </div>
        </div>
        <?php
        
    }
    
    }    else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="" class="close" data-dismiss="alert">&times</a>
                Erro ao cadastrar
            </div>
        </div>
        <?php
    
    }
}
?>

<div class="row">
    <div class="col-md-3" >
        <div id="formulario">
            <form action="" method="POST">
                <label>Pergunta da Questao: </label><br>
                <textarea class="form-control"  NAME="dscr" ROWS=3 COLS=32></textarea>
                
                <label>Alternativa 1: </label><br>
                <textarea class="form-control"  NAME="altercorreta" ROWS=2 COLS=32></textarea>
                
                <label>Alternativa 2: </label><br>
                <textarea class="form-control"  NAME="alter2" ROWS=2 COLS=32></textarea>
                
                
                <label>Alternativa 3: </label><br>
                <textarea class="form-control"  NAME="alter3" ROWS=2 COLS=32></textarea>
                
                <label>Alternativa 4: </label><br>
                <textarea class="form-control"  NAME="alter4" ROWS=2 COLS=32></textarea>
                
                <label>Alternativa 5: </label><br>
                <textarea class="form-control"  NAME="alter5" ROWS=2 COLS=32></textarea>
                
                 <label>Ano da Questão </label><br>
                 <input type="number" name="ano" required="required" value="" class="form-control "><br>
                <label>Dificuldade: </label><br>
                <select name="dificuldade" class="form-control">
                    <?php foreach ($objtpc->SelectNomeDificuldade() as $rst) { ?>
                        <option value="<?= $rst['ID_DIFICULDADE']; ?>"><?= $objFcs->tratarCaracter($rst['NM_DIFICULDADE'], 2) ?></option>
                    <?php } ?>
                </select>
                <label>Tipo de Competência :</label><br>
                <select name="competencia" class="form-control">
                    <?php foreach ($objtpc->SelectNomeTpCompetencia() as $rst) { ?>
                        <option value="<?= $rst['ID_COMPETENCIA']; ?>"><?= $objFcs->tratarCaracter($rst['NM_COMPETENCIA'], 2) ?></option>
                    <?php } ?>
                </select>

                <label>Materia:</label>
                <select class="form-control" name="materia" >
                    <?php foreach ($objtpc->SelectNomeMateria() as $rst) { ?>
                        <option value="<?= $rst['ID_MATERIA']; ?>"><?= $objFcs->tratarCaracter($rst['NM_MATERIA'], 2) ?></option>
                    <?php } ?>
                </select>

                <label>Assunto:</label>
                
                <select class="form-control"  name="assunto" >
                    <?php foreach ($objtpc->SelectNomeAssunto() as $rst) { ?>
                        <option value="<?= $rst['ID_ASSUNTO']; ?>"><?= $objFcs->tratarCaracter($rst['NM_ASSUNTO'], 2) ?></option>
                    <?php } ?>
                </select>
                
                <label>Semestre:</label>
                <select class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    
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


