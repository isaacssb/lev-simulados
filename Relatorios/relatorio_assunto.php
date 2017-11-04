<?php
require_once 'classes/Assunto.class.php';
require_once 'classes/Funcoes.class.php';

$objFcs = new Funcoes();
$objtpc = new Assunto();


if (isset($_POST['btnModalCadastrar'])) {
    if ($objtpc->queryVerificar($_POST) == 'ok') {
        if ($objtpc->queryInsert($_POST) == 'ok') {
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
                    Assunto cadastrado com sucesso!
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
                    Erro ao cadastrar
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
                Assunto já cadastrado !
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
                <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
                Alteração realizada com sucesso!
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
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
                <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
                Assunto excluído com Sucesso
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_assunto" class="close" data-dismiss="alert">&times</a>
                Erro ao Excluir 
            </div>
        </div>
        <?php
    }
}
?>

<div class="container theme-showcase" role="main"> 
    <div class="page-header">
        <h1>Listar Assuntos</h1>
    </div>
    <div class="row">
        <div class="pull-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalCadastrarAssunto">Cadastrar</button>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Matéria</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- todos dados da pesquisa vao ser atribuido na variavel $rst -->
                    <?php foreach ($objtpc->querySelect() as $rst) { ?>
                        <tr>

                            <td><?= $rst['ID_ASSUNTO']; ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['NM_MATERIA'], 2) ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['NM_ASSUNTO'], 2) ?></td>
                            <td>...</td>
                            <td><?= $objFcs->tratarCaracter($rst['STATUS_ASSUNTO'], 2) ?></td>
                            <td><?= $rst['DATA_CADASTRO']; ?></td>

                            <td> 
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalDetalhes<?= $rst['ID_ASSUNTO']; ?>">Visualizar</button>
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modalEditarAssunto" data-whatever="<?php echo $rst['ID_ASSUNTO']; ?>" data-whateverpergunta="<?php echo $objFcs->tratarCaracter($rst['DSCR_ASSUNTO'], 2) ?>" data-whatevernome="<?php echo $objFcs->tratarCaracter($rst['NM_ASSUNTO'], 2) ?>" >Editar</button><!--errado aqui-->

                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirAssunto" data-whatever="<?php echo $rst['ID_ASSUNTO']; ?>" data-whatevernome="<?php echo $objFcs->tratarCaracter($rst['NM_ASSUNTO'], 2) ?>" >Excluir</button><!--errado aqui-->
                            </td>
                        </tr>
                    <div class="modal fade" id="modalDetalhes<?= $rst['ID_ASSUNTO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel"><?php echo $objFcs->tratarCaracter($rst['NM_ASSUNTO'], 2) ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <div class="modal-body">
                                    <p><strong>ID DO ASSUNTO:</strong> <?php echo $rst['ID_ASSUNTO']; ?></p>
                                    <p><strong>NOME DA MATÉRIA:</strong> <?php echo $rst['NM_MATERIA']; ?></p>
                                    <p><strong>NOME DO ASSUNTO:</strong> <?php echo $objFcs->tratarCaracter($rst['NM_ASSUNTO'], 2) ?></p>
                                    <p><strong>DESCRIÇÃO DO ASSUNTO:</strong> <?php echo $objFcs->tratarCaracter($rst['DSCR_ASSUNTO'], 2) ?></p>
                                    <p><strong>STATUS:</strong> <?php echo $objFcs->tratarCaracter($rst['STATUS_ASSUNTO'], 2) ?></p>
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
<div class="modal fade" id="modalEditarAssunto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nome:</label>
                        <input name="nome" type="text" class="form-control" id="recipient-name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Informações sobre o Assunto: </label><br>
                        <textarea id="recipient-info" class="form-control"  NAME="dscr" ROWS=3 COLS=32></textarea>
                    </div>
                    <div class="form-group">
                        <label>Materia: </label><br>
                        <select name="materia" class="form-control">

                            <?php foreach ($objtpc->SelectNome() as $rst) { ?>
                                <option value="<?= $rst['ID_MATERIA']; ?>"><?= $objFcs->tratarCaracter($rst['NM_MATERIA'], 2) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status: </label><br>
                        <select name="status" class="form-control">
                            <option value="ATIVADO">ATIVADO</option> 
                            <option value="DESATIVADO">DESATIVADO</option> 
                        </select>
                    </div><br>

                    <input name="id" type="hidden" class="form-control" id="id-assunto" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalAlterar">Alterar</button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIM MODAL EDITAR -->

<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modalExcluirAssunto" tabindex="-1" role="dialog" aria-labelledby="modalExcluir">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalExcluir"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <p>Tem certeza que deseja excluir o assunto?</p>
                    </div>
                    <input name="id" type="hidden" class="form-control" id="id-assunto" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalExcluir">Excluir</button>

                </form>
            </div>

        </div>
    </div>
</div>

<!--FIM MODAL EXCLUIR -->


<!-- MODAL CADASTRAR -->
<div class="modal fade" id="modalCadastrarAssunto" tabindex="-1" role="dialog" aria-labelledby="ModalCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCadastrar">Cadastrar Assunto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nome:</label>
                        <input name="nome" type="text" class="form-control" id="recipient-name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Informações sobre o Assunto: </label><br>
                        <textarea id="recipient-name" class="form-control"  NAME="dscr" ROWS=3 COLS=32></textarea>
                    </div>
                    <div class="form-group">
                        <label>Materia: </label><br>
                        <select name="materia" class="form-control">

                            <?php foreach ($objtpc->SelectNome() as $rst) { ?>
                                <option value="<?= $rst['ID_MATERIA']; ?>"><?= $objFcs->tratarCaracter($rst['NM_MATERIA'], 2) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status: </label><br>
                        <select name="status" class="form-control">
                            <option value="ATIVADO">ATIVADO</option> 
                            <option value="DESATIVADO">DESATIVADO</option> 
                        </select>
                    </div><br>




                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="btnModalCadastrar">Cadastrar</button>

                </form>
            </div>

        </div>
    </div>
</div>