<?php
	require_once 'Conexao.class.php';
	
	// abre a conexão
	$PDO = conectar();
	
	// SQL para selecionar os registros
	$sql_msg = "SELECT id, nomeMateria, statusMateria FROM MATERIA ORDER BY id ASC";
	
	// seleciona os registros
	$resultado_msg = $PDO->prepare($sql_msg);
	$resultado_msg->execute();
	
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Celke - Mensagens de Contatos</title>
    </head>
 
    <body>
        <div class="container theme-showcase" role="main"> 
			<div class="page-header">
				<h1>Listar Mensagens de Contatos</h1>
			</div>
			<div class="pull-right">
				<p><a href="form_add.php"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a></p>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Assunto</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								//Para obter os dados pode ser utilizado um while percorrendo assim cada linha retornada do banco de dados:
								while ($msg_contatos = $resultado_msg->fetch(PDO::FETCH_ASSOC)): ?>
									<tr>
										<td><?php echo $msg_contatos['id']; ?></td>
										<td><?php echo $msg_contatos['nome']; ?></td>
										<td><?php echo $msg_contatos['email']; ?></td>
										<td><?php echo $msg_contatos['assunto']; ?></td>
										<td>
											<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
										</td>
										
									</tr>    
								<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>