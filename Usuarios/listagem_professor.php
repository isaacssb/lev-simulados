<?php
require_once 'classes/Usuario.class.php';
require_once 'classes/Funcoes.class.php';

$objFcs = new Funcoes();
$objtpc = new Pessoa();


if (isset($_POST['btnModalCadastrar'])) {
    if ($_POST['senha'] == $_POST['csenha']) {
        if ($objtpc->queryVerificarEmail($_POST) == 'ok') {
            if ($objtpc->queryInsertProfessor($_POST) == 'ok') {
                ?>
                <div class="message">
                    <div class="alert alert-success">
                        <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                        Usuário cadastrada com sucesso!
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="message">
                    <div class="alert alert-danger">
                        <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                        Erro ao cadastrar
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                    Email já cadastrado !
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                Confirmação de Senha Invalida
            </div>
        </div>
        <?php
    }
}


if (isset($_POST['btnModalAlterarProfessor'])) {
    if ($objtpc->queryUpdateProfessor($_POST) == 'ok') {
        ?>
        <div class="message">
            <div class="alert alert-success">
                <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                Alteração realizada com sucesso!
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
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
                <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                Usuário Excluído com sucesso
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="message">
            <div class="alert alert-danger">
                <a href="index.php?op=listagem-usuarios" class="close" data-dismiss="alert">&times</a>
                Erro ao Excluir 
            </div>
        </div>
        <?php
    }
}
?>

<div class="container theme-showcase" role="main"> 
    <div class="page-header">

    </div>
    <div class="row">
        <div class="pull-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalCadastrarUsuario">Cadastrar</button>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    Relatórios e Cadastro de Professores
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  id="dataTable" cellspacing="0">
                            <thead width="100%">
                                <tr>
                                    <th>ID</th>
                                    <th>NOME USUARIO</th>
                                    <th>TIPO USUARIO</th>
                                    <th>Data de Cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody >
                                <!-- todos dados da pesquisa vao ser atribuido na variavel $rst -->
                                <?php foreach ($objtpc->querySelectProfessor() as $rst) { ?>
                                    <tr>

                                        <td><?= $rst['ID_PESSOA']; ?></td>
                                        <td><?= $objFcs->tratarCaracter($rst['NM_PESSOA'], 2) ?></td>
                                        <td><?= $objFcs->tratarPessoa($rst['TIPO_PESSOA'], 2) ?></td>
                                        <td><?= $rst['DATA_CADASTRO']; ?></td>
                                        <td> 
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalDetalhes<?= $rst['ID_PESSOA']; ?>">Visualizar</button>
                                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modalEditarProfessor" data-whatever="<?php echo $rst['ID_PESSOA']; ?>" data-whateveremail="<?php echo $rst['EMAIL_PESSOA']; ?>" data-whatevercidade="<?php echo $objFcs->tratarCaracter($rst['CIDADE_PESSOA'], 2) ?>" data-whatevernome="<?php echo $objFcs->tratarCaracter($rst['NM_PESSOA'], 2) ?>" >Editar</button>
                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirUsuario" data-whatever="<?php echo $rst['ID_PESSOA']; ?>" data-whatevernome="<?php echo $objFcs->tratarCaracter($rst['NM_PESSOA'], 2) ?>" >Excluir</button>  
                                        </td>
                                    </tr>

                                    <!-- INICIO DO MODAL VISUALIZAR DETALHES -->
                                <div class="modal fade" id="modalDetalhes<?= $rst['ID_PESSOA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center" id="myModalLabel"><?php echo $objFcs->tratarCaracter($rst['NM_PESSOA'], 2) ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            </div>
                                            <div class="modal-body">
                                                <p><strong>ID DO USUARIO:</strong> <?php echo $rst['ID_PESSOA']; ?></p>
                                                <p><strong>NOME DO USUARIO:</strong> <?php echo $objFcs->tratarCaracter($rst['NM_PESSOA'], 2) ?></p>
                                                <p><strong>TIPO DE USUARIO:</strong> <?php echo $objFcs->tratarPessoa($rst['TIPO_PESSOA'], 2) ?></p>
                                                <p><strong>EMAIL:</strong> <?php echo $rst['EMAIL_PESSOA']; ?></p>
                                                <p><strong>ESCOARIDADE:</strong> <?php echo $rst['ESCOLARIDADE_PESSOA']; ?></p>
                                                <p><strong>CIDADE:</strong> <?php echo $rst['CIDADE_PESSOA']; ?></p>
                                                <p><strong>DATA DE CADASTRO:</strong> <?php echo $rst['DATA_CADASTRO']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal -->
                            <?php } ?>
                            <!-- Fim  foreach -->

                            <!-- Fim Modal -->
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- MODAL EDITAR -->
<div class="modal fade" id="modalEditarProfessor" tabindex="-1" role="dialog" aria-labelledby="ModalEditar">
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
                        <label for="recipient-email" class="control-label">Email:</label>
                        <input name="email" type="email" class="form-control" id="recipient-email">
                    </div>
                    <div class="form-group">
                        <label>Escolaridade: </label><br>
                        <select name="escolaridade" class="form-control">
                            <option value="Ensino Fundamental">Ensino Fundamental</option> 
                            <option value="Ensino Medio">Ensino Medio</option> 
                            <option value="Ensino Superior">Ensino Superior</option> 
                        </select>
                        <label>Cidade: </label><br>
                        <input type="text" name="cidade" required="required" id="cidade-pessoa" value="" class="form-control "><br>
                    </div>


                    <input name="id" type="hidden" class="form-control" id="id-usuario" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalAlterarProfessor">Alterar</button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIM MODAL EDITAR -->


<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modalExcluirUsuario" tabindex="-1" role="dialog" aria-labelledby="modalExcluir">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalExcluir"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <p>Tem certeza que deseja excluir o usuario </p>
                    </div>
                    <input name="id" type="hidden" class="form-control" id="id-usuario" value="">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btnModalExcluir">Excluir</button>

                </form>
            </div>

        </div>
    </div>
</div>

<!--FIM MODAL EXCLUIR -->


<!-- MODAL CADASTRAR -->


<div class="modal fade" id="modalCadastrarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCadastrar">Cadastrar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nome do Usuário: </label><br>
                        <input type="text" name="nome" required="required" value="" class="form-control "><br>
                        <label>Email: </label><br>
                        <input type="email" name="email" required="required" value="" class="form-control">

                        <label>Escolaridade: </label><br>
                        <select name="escolaridade" class="form-control">
                            <option value="Ensino Fundamental">Ensino Fundamental</option> 
                            <option value="Ensino Medio">Ensino Medio</option> 
                            <option value="Ensino Superior">Ensino Superior</option> 
                        </select>
                        <label>Cidade: </label><br>
                        <input type="text" name="cidade" required="required" value="" class="form-control "><br>
                        <label>Senha: </label><br>
                        <input type="password" name="senha" required="required" value="" class="form-control">
                        <label>Confirmação de Senha: </label><br>
                        <input type="password" name="csenha" required="required" value="" class="form-control">


                    </div>




                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="btnModalCadastrar">Cadastrar</button>

                </form>
            </div>

        </div>
    </div>
</div>

