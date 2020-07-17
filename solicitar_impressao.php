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
	</head>
	<body class="hold-transition sidebar-mini text-sm accent-orange">
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand text-sm border-bottom-0 navbar-light navbar-orange">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="index3.html" class="nav-link">Inicio</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="#" class="nav-link">Contact</a>
					</li>
				</ul>
				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<img src="dist/img/user2-160x160.jpg" class="img-user img-circle elevation-3" alt="User Image">
							<span>Sander Eto</span>
						</a>
						
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								Meus Dados
								<!-- Message End -->
							</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							Sair
						</a>
						
					</li>
				
				</ul>
			</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
			<aside class="main-sidebar elevation-4 sidebar-no-expand sidebar-light-orange">
				<!-- Brand Logo -->
				<a href="index3.html" class="brand-link text-sm navbar-orange">
					<img src="dist/img/AdminLTELogo.png"
						alt="AdminLTE Logo"
						class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light">AdminLTE 3</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
				<!-- Sidebar user (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block">Alexander Pierce</a>
						</div>
					</div>

				<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar text-sm flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
							with font-awesome or any other icon font library -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>
										Cadastros
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="index.html" class="nav-link">
											<i class="far nav-icon"></i>
											<p>Novo Cadastro</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="index2.html" class="nav-link">
											<i class="far  nav-icon"></i>
											<p>Consultar Cadastro</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Impressões
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="../layout/top-nav.html" class="nav-link">
											<i class="far fa-plus-letf nav-icon"></i>
											<p>Nova Solicitação</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="../layout/boxed.html" class="nav-link">
											<i class="far nav-icon"></i>
											<p>Consultar solicitações</p>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Solicitar Impressão</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">DataTables</li>
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
									<h3 class="card-title">Solicitar impressões de arquivos:</h3>
								</div>
								<!-- /.card-header -->
								<form method="POST" action="controller/insertSolicitacao.php">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<label >CURSO</label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group "></span>
													</div>
													<input type="text" name="nome" class="form-control" placeholder=" Ex: Ciencia da Computação">
												</div>

											</div>
											<div class="col-md-6">
												<label >DISCIPLINA</label>         
												<div class="input-group mb-3">
													<div class="input-group-prepend ">
														<span class="input-group "></span>
													</div>
													<input type="text" name="disciplina" class="form-control" placeholder="Ex: Redes de Computadores">
												</div>
											</div>
										</div>
										<div class="row">
											
											<div class="col-md-3">

												<label>TIPO DE IMPRESSÃO</label>
												<select class="form-control mb-3 " name="tipo" >
													<option selected="selected">Selecione </option>
													<option value="1">Avaliação Oficial 1</option>
													<option value="2">Avaliação Oficial 2</option>
													<option value="2">Avaliação Parcial 1</option>
													<option value="2">Avaliação Parcial 2</option>
													<option value="2">Exame Final</option>
													<option value="2">Avaliação Substitutiva</option>
													<option value="2">Outros...</option>

												</select>
											</div>
										
										<div class="col-md-3  ">

												<label>QUANTIDADE</label>
												<div class="input-group  ">
													<label for="sel1" ></label>
 														 <select class="form-control mb-3" id="sel1" name="quantidade">
 														 	<option>Selecione</option>
   															<option>1</option>
    														<option>2</option>
    														<option>3</option>
   															<option>4</option>
   															<option>5</option>
   															<option>6</option>
   															<option>7</option>
   															<option>8</option>
   															<option>9</option>
   															<option>10</option>
   															<option>11</option>
   															<option>12</option>
   															<option>13</option>
   															<option>14</option>
   															<option>15</option>
  														</select>	
												</div>
										</div>
										<div class="col-md-6">
													<label>FRENTE E VERSO ?</label>
													   <div class="form-check">
														<input class="form-check-input" type="radio" name="frenteverso" id="conjuntoSim" value="true" checked>
														<label class="form-check-label" for="conjuntoSim">
															SIM
														</label>
														</div>
														<div class="form-check">
														<input class="form-check-input" type="radio" name="frenteverso" id="conjuntoNao" value="false">
														<label class="form-check-label" for="conjuntoNao">
															NÃO
														</label>
													</div> 
											</div>

									</div>
									<div class="row">
										<div class="col-md-6">
											<form>
										  	<div class="form-group">
										    	<label for="exampleFormControlFile1">SELECIONE O ARQUIVO PARA ENVIO</label>
										    	<input type="file" class="form-control-file" id="exampleFormControlFile1">
										  	</div>
										</form>
										</div>
										
									</div>
									
										<div class="text-right">
											<button type="submit" class="btn btn-app">
												<i class="fas fa-save"></i> Salvar
											</button>
										</div>
									<!-- /.card-body -->
								</form>
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
			<footer class="main-footer">
				<div class="float-right d-none d-sm-block">
					<b>Version</b> 3.0.4
				</div>
				<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
				reserved.
			</footer>

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
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			});
		});


		$('input[type=file]').change(function () {
			var splitNomeArquivo = this.files[0]["name"].split(".");
			var posicaoExtensao = splitNomeArquivo.length - 1;
			var extencao = splitNomeArquivo[posicaoExtensao];
			if(extencao.toLowerCase() !== "pdf"){
				alert("É NECESSÁRIO QUE O ARQUIVO DE PROVA SEJA DO TIPO PDF");
				$('input[type=file]').val("");
			}
		});
		</script>
	</body>
</html>