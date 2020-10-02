<?php
require_once('adminphp/validaSessao.php');
require_once('adminphp/conecta.php');
require_once('controller/getAdminData.php');
require_once('controller/getAdminGraficosData.php');
if($_SESSION['PERFIL'] != 1){
	logout();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema de Provas</title>
	<link rel="icon" href="print.png">

	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="cadastro.css">
	<link rel="stylesheet" href="css/alerta.css">
	<link rel="stylesheet" href="css/card.css">
</head>

<body class="hold-transition sidebar-mini text-sm accent-orange">
	<div class="wrapper">
		<?php
		require_once('case.php');
		cabecalho();
		nav();
		?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!--Mensagem de Alerta do cadastro-->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Bem Vindo</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="admin_home.php">Home</a></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Resumo das Solicitações</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class='col-12'>
										<div class="card-container">
											<div class="card-container-header">
												<p>Últimas Solicitações Pendentes</p>
											</div>
											<div class="card-container-content">
												<?php
												if (empty($table_data)) {
													echo $no_data;
												}
												?>
												<table class="table table-bordered table-striped" <?php if (empty($table_data)) {
																										echo "style='display:none;'";
																									}
																									?>>
													<thead>
														<tr>
															<th>Professor</th>
															<th>Data da Solicitação</th>
															<th>Curso</th>
															<th>Disciplina</th>
															<th>Quantidade</th>
															<th>Ações</th>
														</tr>
													</thead>
													<tbody>
														<?php if (!empty($table_data)) {
															echo $table_data;
														}
														?>

													</tbody>
													<tfoot>

													</tfoot>
												</table>
											</div>
										</div>
									</div>

									<div class='col-6'>
										<div class="card-container">
											<div class="card-container-header">
												<p>Solicitações Por Usuário</p>
											</div>
											<div class="card-container-content" id="container-usuario-sem-conteudo">
												<canvas id="solicitacao-por-usuario" class="graficos"></canvas>
												<!-- Sem conteudo usuario-->
												<div class="sem-conteudo" id="sem-conteudo-usuario" style="display:none;">
													<div class="sem-conteudo-icon">
														<i class="fas fa-mug-hot"></i>
													</div>
													<div class="sem-conteudo-texto">
														<p>Nenhum registro foi carregado</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class='col-6'>
										<div class="card-container">
											<div class="card-container-header">
												<p>Solicitações Por Status</p>
											</div>
											<div class="card-container-content" id="container-status-sem-conteudo">
												<canvas id="solicitacao-por-status" class="graficos"></canvas>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php
		rodape();
		?>


		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script>
		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="js/graficos.js"></script>
	<script>
		var jsonUsuarioData = <?= $json_usuario_data; ?>;
		var jsonStatusData = <?= $json_status_data; ?>;
		var montaGraficoUser = montaGrafico(jsonUsuarioData, 'solicitacao-por-usuario', 'pie')
		var montaGraficoStatus = montaGrafico(jsonStatusData, 'solicitacao-por-status', 'pie')
	</script>

</body>

</html>
