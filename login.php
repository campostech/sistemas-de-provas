<?php
require_once('adminphp/verificausuario.php');

if (isset($_REQUEST['status']) and $_REQUEST['status'] == 401) {
	$d_none = "";
	$msg_alerta = "Usuário ou Senha informados inválidos";
} else if (isset($_REQUEST['status']) and $_REQUEST['status'] == 402) {
	$d_none = "";
	$msg_alerta = "Seu usuário não tem permissão para acessar a página requisitada. Faça login novamente.";
} else {
	$d_none = "d-none";
	$msg_alerta = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Impressão de Provas</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/login.js"></script>
	<link rel="stylesheet" href="css/login.css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/alerta.css" rel="stylesheet" type="text/css">

	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->


	<!-- /main navbar -->
	<!-- <div class="">
		<div class="alerta-cadastro-container alerta-login-pagina <?php echo $d_none; ?>">			
		<div clas="alerta-cadastro">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<?php echo $msg_alerta; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			</div>
		</div>
	</div> -->

	<!-- Page content -->
	<div class="page-content" id="body">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content justify-content-center align-items-center">

				<div class="alerta-cadastro-container alerta-login-pagina <?php echo $d_none; ?>">
					<div>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<?php echo $msg_alerta; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					</div>
				</div>

				<!-- Login form -->
				<div class="content d-flex justify-content-center align-items-center container-login-margin">
					<form class="login-form" method="POST" action="controller/login.php">
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Entre com sua conta</h5>
									<span class="d-block text-muted">Digite suas credenciais</span>
								</div>
								<div class="form-group form-group-feedback form-group-feedback-left">
									<input onkeydown="fMasc(this, mCPF)" maxlength="14" name="cpf" type="text" class="form-control" placeholder="CPF">
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input name="senha" type="password" class="form-control" placeholder="Password">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Login<i class="icon-circle-right2 ml-2"></i></button>
								</div>

								<div class="form-group text-center text-muted content-divider">
									<a href="#">Esqueceu sua Senha ?</a>
								</div>


							</div>
						</div>
					</form>
				</div>
				<!-- /login form -->

			</div>
			<!-- /content area -->


			<!-- Footer -->

			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
<script src="utils/masks.js"></script>

</html>