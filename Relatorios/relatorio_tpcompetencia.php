<?php
require_once 'classes/TipoCompetencia.class.php';
require_once 'classes/Funcoes.class.php';

$objFcs = new Funcoes();
$objtpc = new TipoCompetencia();


if (isset($_POST['btnModalCadastrar'])) {
    if ($objtpc->queryVerificar($_POST) == 'ok') {
        if ($objtpc->queryInsert($_POST) == 'ok') {
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                    Competência cadastrada com sucesso!
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                    Erro ao cadastrar
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                Competência já cadastrado !
            </div>
        </div>
        <?php
    }
}


if (isset($_POST['btnModalAlterar'])) {

    if ($objtpc->queryUpdate($_POST) == 'ok') {
        ?>
        <div class="message">
            <div class="alert alert-success">
                <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                Alteração realizada com sucesso!
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                Erro no Cadastro
            </div>
        </div>
        <?php
    }
}

if (isset($_POST['btnModalExcluir'])) {

    if ($objtpc->queryDelete($_POST) == 'ok') {
        ?>
        <div class="message">
            <div class="alert alert-success">
                <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                Dificuldade excluída com Sucesso
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_tpcompetencia" class="close" data-dismiss="alert">&times</a>
                Erro ao Excluir 
            </div>
        </div>
        <?php
    }
}
?>

<div class="container theme-showcase" role="main"> 
    <div class="page-header">
        <h1>Listar Compêtencias</h1>
    </div>
    <div class="row">
        <div class="pull-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalCadastrarCompetencia">Cadastrar</button>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Competência</th>
                        <th>Status</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- todos dados da pesquisa vao ser atribuido na variavel $rst -->
                    <?php foreach ($objtpc->querySelect() as $rst) { ?>
                        <tr>

                            <td><?= $rst['ID_COMPETENCIA']; ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['NM_COMPETENCIA'], 2) ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['STATUS_COMPETENCIA'], 2) ?></td>
                            <td><?= $rst['DATA_CADASTRO']; ?></td>
                            
                            <td> 
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalDetalhes<?= $rst['ID_COMPETENCIA']; ?>">Visualizar</button>
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modalEditarCompetencia" data-whatever="<?php echo $rst['ID_COMPETENCIA']; ?>" data-whatevernome="<?php echo $objFcs->tratarCaracter($rst['NM_COMPETENCIA'], 2) ?>" >Editar</button>

                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirCompetencia" data-whatever="<?php echo $rst['ID_COMPETENCIA']; ?>" data-whatevernome="<?php echo $objFcs->tratarCaracter($rst['NM_COMPETENCIA'], 2) ?>" >Excluir</button>  
                            </td>
                        </tr>
                         <div class="modal fade" id="modalDetalhes<?= $rst['ID_COMPETENCIA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel"><?php echo $objFcs->tratarCaracter($rst['NM_COMPETENCIA'], 2) ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            </div>
                            <div class="modal-body">
                                <p><strong>ID DA COMPETÊNCIA:</strong> <?php echo $rst['ID_COMPETENCIA']; ?></p>
                                <p><strong>NOME DA COMPETÊNCIA:</strong> <?php echo $objFcs->tratarCaracter($rst['NM_COMPETENCIA'], 2) ?></p>
                                <p><strong>STATUS:</strong> <?php echo $objFcs->tratarCaracter($rst['STATUS_COMPETENCIA'], 2) ?></p>
                                <p><strong>DATA DE CADASTRO:</strong> <?php echo $rst['DATA_CADASTRO']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php } ?>

                    <!-- INICIO DO MODAL VISUALIZAR DETALHES -->
               
                <!-- Fim Modal -->
                </tbody>

            </table>
        </div>
    </div>

</div>

<!-- Fim Modal -->

<!-- MODAL EDITAR -->
<div class="modal fade" id="modalEditarCompetencia" tabindex="-1" role="dialog" aria-labelledby="ModalEditar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalEditar">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nome:</label>
                        <input name="nome" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label>Status: </label><br>
                        <select name="status" class="form-control">
                            <option value="ATIVADO">ATIVADO</option> 
                            <option value="DESATIVADO">DESATIVADO</option> 
                        </select>
                    </div>
                    <input name="id" type="hidden" class="form-control" id="id-competencia" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalAlterar">Alterar</button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIM MODAL EDITAR -->


<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modalExcluirDificuldade" tabindex="-1" role="dialog" aria-labelledby="modalExcluir">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalExcluir"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <p>Tem certeza que deseja excluir a materia</p>
                    </div>
                    <input name="id" type="hidden" class="form-control" id="id-dificuldade" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalExcluir">Excluir</button>

                </form>
            </div>

        </div>
    </div>
</div>

<!--FIM MODAL EXCLUIR -->


<!-- MODAL CADASTRAR -->



<div class="modal fade" id="modalCadastrarDificuldade" tabindex="-1" role="dialog" aria-labelledby="ModalCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCadastrar">Cadastrar Dificuldade</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nome da Dificuldade: </label><br>
                        <input type="text" name="nome" required="required" value="" class="form-control "><br>
                        <label>Status: </label><br>
                        <select name="status" class="form-control">
                            <option value="ATIVADO">ATIVADO</option> 
                            <option value="DESATIVADO">DESATIVADO</option> 
                        </select>
                    </div>




                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="btnModalCadastrar">Cadastrar</button>

                </form>
            </div>

        </div>
    </div>
</div>