<?php
require_once 'classes/Questoes.class.php';
require_once 'classes/Funcoes.class.php';
require_once 'classes/alternativas.class.php';

$objalter = new alternativas();
$objFcs = new Funcoes();
$objtpc = new Questoes();


if (isset($_POST['btnModalCadastrar'])) {
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


if (isset($_POST['btnModalAlterar'])) {

    if ($objtpc->queryUpdate($_POST) == 'ok') {
        ?>
        <div class="message">
            <div class="alert alert-success">
                <a href="index.php?op=relatorio_questoes" class="close" data-dismiss="alert">&times</a>
                Alteração realizada com sucesso!
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_questoes" class="close" data-dismiss="alert">&times</a>
                Erro ao Cadastrar
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
                <a href="index.php?op=relatorio_questoes" class="close" data-dismiss="alert">&times</a>
                Questão excluída com Sucesso
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=relatorio_questoes" class="close" data-dismiss="alert">&times</a>
                Erro ao Excluir 
            </div>
        </div>
        <?php
    }
}
?>

<div class="container theme-showcase" role="main"> 
    <div class="page-header">
        <h1>Listar Questões</h1>
    </div>
    <div class="row">
        <div class="pull-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalCadastrarQuestao">Cadastrar</button>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Questão</th>
                        <th>ID Assunto</th>
                        <th>ID Competencia</th>
                        <th>ID Dificuldade</th>
                        <th>Ano Questão</th>
                        <th>Semestre Questão</th>
                        <th>Status</th>
                        <th>Pergunta</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- todos dados da pesquisa vao ser atribuido na variavel $rst -->
                    <?php foreach ($objtpc->querySelect() as $rst) { ?>
                        <tr>

                            <td><?= $rst['ID_QUESTAO']; ?></td>
                            <td><?= $rst['ID_ASSUNTO']; ?></td>
                            <td><?= $rst['ID_COMPETENCIA']; ?></td>
                            <td><?= $rst['ID_DIFICULDADE']; ?></td>
                            <td><?= $rst['ID_ALTERNATIVA']; ?></td>
                            <td><?= $rst['ANO_QUESTAO']; ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['SEMESTRE_QUESTAO'], 2) ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['STATUS_QUESTAO'], 2) ?></td>
                            <td><?= $objFcs->tratarCaracter($rst['PERGUNTA_QUESTAO'], 2) ?></td>
                            
                            <td><?= $rst['DATA_CADASTRO']; ?></td>

                            <td> 
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalDetalhes<?= $rst['ID_QUESTAO']; ?>">Visualizar</button>
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modalEditarQuestao" data-whatever="<?php echo $rst['ID_QUESTAO']; ?>" data-whateverpergunta="<?php echo $objFcs->tratarCaracter($rst['PERGUNTA_QUESTAO'], 2) ?>" data-whateverano="<?php echo $rst['ANO_QUESTAO']; ?>" data-whateversemestre="<?php echo $objFcs->tratarCaracter($rst['SEMESTRE_QUESTAO'], 2) ?>" >Editar</button>
                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirQuestao" data-whatever="<?php echo $rst['ID_QUESTAO']; ?>" data-whatevernome="<?php echo $rst['ID_QUESTAO']; ?>" >Excluir</button>  
                            </td>
                        </tr>
                    <div class="modal fade" id="modalDetalhes<?= $rst['ID_QUESTAO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel"><?php echo $objFcs->tratarCaracter($rst['ID_QUESTAO'], 2) ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <div class="modal-body">
                                    <p><strong>ID DA QUESTAO:</strong> <?php echo $rst['ID_QUESTAO']; ?></p>
                                    <p><strong>ID DO ASSUNTO:</strong> <?php echo $rst['ID_ASSUNTO']; ?></p>
                                    <p><strong>ID DA COMPETENCIA:</strong> <?php echo $rst['ID_COMPETENCIA']; ?></p>
                                    <p><strong>ID DA DIFICULDADE:</strong> <?php echo $rst['ID_DIFICULDADE']; ?></p>
                                    <p><strong>ID DA ALTERNATIVA:</strong> <?php echo $rst['ID_ALTERNATIVA']; ?></p>
                                    <h2>COLOCA AS 5 ALTERNATIVAS AQUI TAMBEM- DEPOIS RETIRAR ESSA MSG</h2>
                                    <p><strong>ANO:</strong> <?php echo $rst['ANO_QUESTAO']; ?></p>
                                    <p><strong>SEMESTRE:</strong> <?php echo $objFcs->tratarCaracter($rst['SEMESTRE_QUESTAO'], 2) ?></p>
                                    <p><strong>STATUS:</strong> <?php echo $objFcs->tratarCaracter($rst['STATUS_QUESTAO'], 2) ?></p>
                                    <p><strong>PERGUNTA:</strong> <?php echo $objFcs->tratarCaracter($rst['PERGUNTA_QUESTAO'], 2) ?></p>
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
<div class="modal fade" id="modalEditarQuestao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">EDITAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <label>Pergunta da Questao: </label><br>
                    <textarea class="form-control"  NAME="dscr" ROWS=3 COLS=32></textarea>

                    <label>Alternativa Correta: </label><br>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalAlterar">Alterar</button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIM MODAL EDITAR -->


<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modalExcluirQuestao" tabindex="-1" role="dialog" aria-labelledby="modalExcluir">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalExcluir"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <p>Tem certeza que deseja excluir a questão?</p>
                    </div>
                    <input name="id" type="hidden" class="form-control" id="id-questao" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalExcluir">Excluir</button>

                </form>
            </div>

        </div>
    </div>
</div>

<!--FIM MODAL EXCLUIR -->


<!-- MODAL CADASTRAR -->



<div class="modal fade" id="modalCadastrarQuestao" tabindex="-1" role="dialog" aria-labelledby="ModalCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCadastrar">Cadastrar Questão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <label>Pergunta da Questao: </label><br>
                    <textarea class="form-control"  NAME="dscr" ROWS=3 COLS=32></textarea>

                    <label>Alternativa Correta: </label><br>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="btnModalCadastrar">Cadastrar</button>

                </form>
            </div>

        </div>
    </div>
</div>