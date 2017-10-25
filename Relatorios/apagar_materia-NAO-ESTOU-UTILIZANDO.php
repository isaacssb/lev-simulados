<?php
require_once 'classes/Materia.class.php';
require_once 'classes/Funcoes.class.php';

$objtpc = new Materia();
$objFcs = new Funcoes();

if (empty($_GET['id'])) {
    echo "ID para alteração não definido";
    exit;
}
$id = $_GET['id'];
$resul_delete = $objtpc->queryDelete($id);

if ($resul_delete == 'ok') {
    ?>
    <div class="message">
        <div class="alert alert-success">
            <a href="" class="close" data-dismiss="alert">&times</a>
            Materia Excluída com sucesso
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="message">
        <div class="alert alert-danger">
            <a href="" class="close" data-dismiss="alert">&times</a>
            Erro ao Excluir
        </div>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-md-6">
<a href="index.php?op=relatorio_materia"><button class="btn btn-primary" >Voltar Relátorios</button></a>
        
    </div>

    <div class="col-md-6">

<a href="index.php?op=cadastro_materia"><button class="btn btn-primary" >Voltar Para os Cadastros</button></a>

    </div>
</div>