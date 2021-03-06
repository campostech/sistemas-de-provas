<?php
include_once("adminphp/conecta.php");
require_once('adminphp/validaSessao.php');
$idUser = $_SESSION['ID'];
$result_usuario = "SELECT * FROM users WHERE ID = $idUser";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Meus Dados</title>
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
	<link rel="stylesheet" href="meus_dados.css">
</head>

<body class="hold-transition sidebar-mini text-sm accent-orange">

	<?php
	require_once('case.php');
	cabecalho();
	nav();
	?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<!--Mensagem de Alerta do cadastro-->

		<div class="alerta-cadastro-container">
			<div class="alerta-cadastro mt-2">
				<?php
				if (isset($_REQUEST['status'])) {
					if ($_REQUEST['status'] == '200') {
						echo '
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									Usuário atualizado com sucesso.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>';
					} else {
						echo '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Erro na atualização do usuário, verifique e tente novamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>';
					}
				}
				?>
			</div>
		</div>

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Consultar Cadastro</h1>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>





		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">

						<div class="card-header container">
							<h3 class="minititulo elevation-2">Meus dados</h3>
						</div>
						<!-- /.card-header -->
						<form method="POST" action="controller/edituser.php" onsubmit="return verificarSenha();">
							<input type="hidden" name="id" value="<?php echo $row_usuario['ID']; ?>">
							<div class="container card-body jumbotron ">
								<div class="row">
									<div class="col-md-6">
										<label>NOME</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text "><i class="fas fa-user"></i></span>
											</div>
											<input type="text" name="nome" class="form-control" value="<?php echo $row_usuario['NOME']; ?>" required id="inputedit1" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<label>E-MAIL</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend ">
												<span class="input-group-text "><i class="fas fa-envelope"></i></span>
											</div>
											<input type="email" name="email" class="form-control" value="<?php echo $row_usuario['EMAIL']; ?>" required id="inputedit2" disabled>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-6">
										<label>CPF</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend ">
												<span class="input-group-text "><i class="fas fa-credit-card"></i></span>
											</div>
											<input type="text" name="cpf" class="form-control" value="<?php echo $row_usuario['CPF']; ?>" required onkeydown="fMasc(this, mCPF)" maxlength="14" id="inputedit3" disabled>
										</div>
									</div>


									<div class="col-md-6">
										<label>Perfil</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend ">
												<span class="input-group-text "><i class="fas fa-address-card"></i></span>
											</div>


											<input type="text" name="perfil" class="form-control" value="<?php $row_usuario['ID_PERFIL'];
																											if ($row_usuario['ID_PERFIL'] == '1') {

																												echo "Administrador";
																											} elseif ($row_usuario['ID_PERFIL'] == '2') {
																												echo "Professor";
																											}

																											?>" required onkeydown="fMasc(this, mCPF)" maxlength="14" disabled>


										</div>
									</div>
								</div>





								<div class="row">
									<div class="col-md-6" id="aparecersenha" style="display:none">

										<label>NOVA SENHA</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend ">
												<span class="input-group-text "><i class="fas fa-lock"></i></span>
											</div>
											<input type="password" name="npassword" class="form-control" value="">

										</div>
									</div>


									<div class="col-md-6" id="aparecersenha4" style="display:none">

										<label>CONFIRME A NOVA SENHA</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend ">
												<span class="input-group-text "><i class="fas fa-lock"></i></span>
											</div>
											<input type="password" name="cnpassword" class="form-control" value="">
										</div>

									</div>
								</div>
								<p class="senhaInvalida">A NOVA SENHA deve conter no mínimo 8 dígitos e ser igual a confirmação de NOVA SENHA!</p>

								<div class="row">


									<div class="col-md-6">
										<label>SUA SENHA ATUAL</label>

										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text "><i class="fas fa-user"></i></span>
											</div>
											<input type="password" name="password" class="form-control" value="*********" required id="inputedit4" disabled>
										</div>

									</div>
								</div>




								<div class="text-right">
									<div id="aparecersenha2" style="display:block">
										<input type="button" value="Editar" onClick="mostra() " class="btn btn-app elevation-1" />
									</div>

									<div id="aparecersenha1" style="display:none">
										<div id="aparecersenha6" style="display:block">
											<input type="button" value="Nova senha" onClick="mostra2() " class="btn btn-app elevation-1" />
										</div>
										<button type="submit" class="btn btn-app elevation-1">
											<i class="fas fa-save"></i> Salvar
										</button>

									</div>

								</div>
							</div>

					</div>

					</form>
				</div>

			</div>

	</div>
	<!-- /.row -->
	</section>







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
		var trocarSenha = false;

		function mostra() {
			document.getElementById('aparecersenha1').style.display = 'block';
			document.getElementById('aparecersenha2').style.display = 'none';
			document.getElementById('inputedit1').disabled = false;
			document.getElementById('inputedit2').disabled = false;
			document.getElementById('inputedit3').disabled = false;
			document.getElementById('inputedit4').disabled = false;
			document.getElementById('inputedit4').value = "";
		}

		function mostra2() {
			document.getElementById('aparecersenha').style.display = 'block';
			document.getElementById('aparecersenha4').style.display = 'block';
			document.getElementById('aparecersenha').attributes.required = "required";
			document.getElementById('aparecersenha4').attributes.required = "required";
			document.getElementById('aparecersenha6').style.display = 'none';
			trocarSenha = true;
			document.getElementsByName('cnpassword')[0].value = "";
			document.getElementsByName('npassword')[0].value = document.getElementsByName('cnpassword')[0].value;
		}



		$(function() {
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

		function verificarSenha() {
			if (!trocarSenha) {
				document.getElementsByName('cnpassword')[0].value = document.getElementsByName('password')[0].value;
				document.getElementsByName('npassword')[0].value = document.getElementsByName('cnpassword')[0].value;
				return true;
			}
			if (document.getElementsByName('npassword')[0].value === document.getElementsByName('cnpassword')[0].value && document.getElementsByName('npassword')[0].value.length > 7) {
				document.getElementsByClassName('senhaInvalida')[0].style.display = 'none';
				return true;
			} else {
				document.getElementsByClassName('senhaInvalida')[0].style.display = 'block';
				return false;
			}
		}
	</script>
	<script src="utils/masks.js"></script>
</body>

</html>