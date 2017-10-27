<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <meta name="author" content="">
        <title>ADMINISTRAÇÃO LEV-SIMULADOS</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/css-form.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="#"><img src="images/logo-lev.png" width="200" height="23" /> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="Index.php">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">
                                Painel de Controle</span>
                        </a>
                    </li>
                    <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estatística">
                        <a class="nav-link" href="#">
                          <i class="fa fa-fw fa-area-chart"></i>
                          <span class="nav-link-text">
                            Estatística</span>
                        </a>
                      </li> -->
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Relatórios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#relatorios_drop" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text">
                                Relatórios</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="relatorios_drop">

                            <li>
                                <a href="index.php?op=relatorio_questoes">Questões</a>
                            </li>
                            <li>
                                <a href="index.php?op=relatorio_dificuldade">Dificuldades</a>
                            </li>
                            <li>
                                <a href="index.php?op=relatorio_materia">Materias</a>
                            </li>
                            <li>
                                <a href="index.php?op=relatorio_assunto">Assuntos</a>
                            </li>
                            <li>
                                <a href="index.php?op=relatorio_tpcompetencia">Tipos de Competencias </a>
                            </li>

                        </ul>

                    </li>

                    <!--   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cadastros">
                         <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                           <i class="fa fa-fw fa-file"></i>
                           <span class="nav-link-text">
                             Cadastros</span>
                         </a>
                         <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                           
                           <li>
                             <a href="index.php?op=cadastro_questoes">Questões</a>
                           </li>
                           <li>
                             <a href="index.php?op=cadastro_dificuldade">Dificuldades</a>
                           </li>
                           <li>
                             <a href="index.php?op=cadastro_materia">Materias</a>
                           </li>
                           <li>
                             <a href="index.php?op=cadastro_assunto">Assuntos</a>
                           </li>
                           <li>
                             <a href="index.php?op=cadastro_tpcompetencia">Tipos de Competencias </a>
                           </li>
             
                         </ul>
                       </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                         <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                           <i class="fa fa-fw fa-sitemap"></i>
                           <span class="nav-link-text">
                             Menu Levels</span>
                         </a>
                         <ul class="sidenav-second-level collapse" id="collapseMulti">
                           <li>
                             <a href="#">Second Level Item</a>
                           </li>
                           <li>
                             <a href="#">Second Level Item</a>
                           </li>
                           <li>
                             <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
                             <ul class="sidenav-third-level collapse" id="collapseMulti2">
                               <li>
                                 <a href="#">Third Level Item</a>
                               </li>
                               <li>
                                 <a href="#">Third Level Item</a>
                               </li>
                             </ul>
                           </li>
                         </ul>
                       </li> -->
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">
                                Usuários </span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a href="index.php?op=listagem-usuarios">Usuarios</a>
                            </li>
                            <li>
                                <a href="index.php?op=listagem-alunos">Alunos</a>
                            </li>
                            <li>
                                <a href="index.php?op=listagem-professor">Professor</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="#">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text">
                                Link</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    </li>


                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>
                            Sair</a>
                    </li>
                </ul>
            </div>
        </nav>



        <div class="content-wrapper">

            <div class="container-fluid">
                <!--REDIRECIONAMENTO LISTAGEM -->
                <?php
                if ($_GET) {
                    if (isset($_GET['op'])) {
                        $op = $_GET['op'];

                        if ($op == "relatorio_questoes") {
                            include './Relatorios/relatorio_questoes.php';
                        }
                        if ($op == "relatorio_dificuldade") {
                            include './Relatorios/relatorio_dificuldade.php';
                        }
                        if ($op == "relatorio_assunto") {
                            include './Relatorios/relatorio_assunto.php';
                        }
                        if ($op == "relatorio_materia") {
                            include './Relatorios/relatorio_materia.php';
                        }

                        if ($op == "relatorio_tpcompetencia") {
                            include './Relatorios/relatorio_tpcompetencia.php';
                        }
                        if ($op == "listagem-alunos") {
                            include './Usuarios/listagem_alunos.php';
                        }
                        if ($op == "listagem-usuarios") {
                            include './Usuarios/usuarios.php';
                        }
                        if ($op == "listagem-professor") {
                            include './Usuarios/listagem_professor.php';
                        }
                    }
                }
                ?>


                <!--REDIRECIONAMENTO CADASTROS -->
                <?php
                if ($_GET) {
                    if (isset($_GET['op'])) {
                        $op = $_GET['op'];

                        if ($op == "cadastro_questoes") {
                            include './Cadastros/cadastro_questoes.php';
                        }
                        if ($op == "cadastro_dificuldade") {
                            include './Cadastros/cadastro_dificuldade.php';
                        }
                        if ($op == "cadastro_assunto") {
                            include './Cadastros/cadastro_assunto.php';
                        }
                        if ($op == "cadastro_materia") {
                            include './Cadastros/cadastro_materia.php';
                        }

                        if ($op == "cadastro_tpcompetencia") {
                            include './Cadastros/cadastro_tpcompetencia.php';
                        }
                        if ($op == "listagem-teste") {
                            include './Usuarios/listagem-tiposUsuarios.php';
                        }
                    }
                }
                ?>






            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.content-wrapper -->



<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
         <small>Copyright &copy; SOLARI COMPANY 2017</small>
        </div>
      </div>
    </footer>


        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- Logout Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pronto Para Sair?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Selecione "Sair" abaixo se você estiver pronto para terminar sua sessão atual.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="sair.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/sb-admin.min.js"></script>

        <!-- SCRIPT EDITAR/EXCLUIR MATERIA --> 
        <script type="text/javascript">
            $('#modalEditarMateria').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Editar Id: ' + recipient)
                modal.find('#id-materia').val(recipient)
                modal.find('#recipient-name').val(recipientnome)


            })
        </script>
        <script type="text/javascript">
            $('#modalExcluirMateria').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Excluir Id: ' + recipient)
                modal.find('#id-materia').val(recipient)
                modal.find('#recipient-name').val(recipientnome)


            })
        </script>
        <!-- FIM SCRIPT -->

        <!-- SCRIPT EDITAR/EXCLUIR DIFICULDADE -->
        <script type="text/javascript">
            $('#modalEditarDificuldade').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Editar Id: ' + recipient)
                modal.find('#id-dificuldade').val(recipient)
                modal.find('#recipient-name').val(recipientnome)


            })
        </script>

        <script type="text/javascript">
            $('#modalExcluirDificuldade').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Excluir Id: ' + recipient)
                modal.find('#id-dificuldade').val(recipient)
                modal.find('#recipient-name').val(recipientnome)


            })
        </script>
        <!-- FIM SCRIPT -->

        <!-- SCRIPT EDITAR/EXCLUIR DIFICULDADE -->
        <script type="text/javascript">
            $('#modalEditarCompetencia').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Editar Id: ' + recipient)
                modal.find('#id-competencia').val(recipient)
                modal.find('#recipient-name').val(recipientnome)


            })
        </script>

        <!-- FIM SCRIPT -->
        <!-- SCRIPT EDITAR/EXCLUIR USUARIO -->
        <script type="text/javascript">
            $('#modalExcluirUsuario').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Excluir Id: ' + recipient)
                modal.find('#id-usuario').val(recipient)
                modal.find('#recipient-name').val(recipientnome)


            })
        </script>
        
        <script type="text/javascript">
            $('#modalEditarUsuario').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')
                var recipientemail = button.data('whateveremail')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Editar Id: ' + recipient)
                modal.find('#id-usuario').val(recipient)
                modal.find('#recipient-name').val(recipientnome)
                modal.find('#recipient-email').val(recipientemail)
            })
        </script>
        <script type="text/javascript">
            $('#modalEditarProfessor').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')
                var recipientemail = button.data('whateveremail')
                var recipientcidade = button.data('whatevercidade')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Editar Id: ' + recipient)
                modal.find('#id-usuario').val(recipient)
                modal.find('#recipient-name').val(recipientnome)
                modal.find('#recipient-email').val(recipientemail)
                modal.find('#cidade-pessoa').val(recipientcidade)
            })
        </script>
        <!-- FIM SCRIPT -->
    </body>

</html>
