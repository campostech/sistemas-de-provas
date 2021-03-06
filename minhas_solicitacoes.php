<?php
require_once('adminphp/conecta.php');
require_once('adminphp/validaSessao.php');
if ($_SESSION['PERFIL'] != 2) {
  logout(true);
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
  <link rel="stylesheet" href="css/alerta.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="css/alerta.css">
</head>

<body class="hold-transition sidebar-mini text-sm accent-orange">
  <div class="wrapper">
    <?php
    require_once('controller/exibeDados.php');
    $d_none = isset($table_data) && !empty($table_data) ? "" : "d-none";

    require_once('case.php');
    cabecalho();
    nav();
    ?>
    <!-- Content Wrapper. Contains page content -->
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
									Solicitação cancelada com sucesso.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>';
            } else if ($_REQUEST['status'] == '403') {
              echo '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Não foi possível cancelar a solicitação.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>';
            } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Ocorreu um erro cancelar a solicitação, verifique e tente novamente.
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
              <h1> Cadastro de Solicitações</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card -->

              <div class="card">
                <div class="card-header ">


                  <a href="solicitar_impressao.php ">
                    <button type="button" class="btn btn-secondary btn-lg  ">Novo Cadastro</button>
                  </a>


                </div>
                <!-- /.card-header -->
                <div class="card-body">

                <?php
                  if (!empty($d_none)) {
                    echo $no_data;
                  }
                  ?>

                  <table class="table table-bordered table-striped <?= $d_none ?>" >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tipo de Impressão</th>
                        <th>Data de Solicitação</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                        <th>Ações</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php

                        if(empty($d_none)){
                            echo $table_data;
                        }                          
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

    <!-- MODAL CANCELAR-->
    <div class="modal" id="cancelar_solicitacao" tabindex="-1" role="dialog" aria-labelledby="confirma_exclusao" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirma_exclusao">Confirmar cancelamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><strong>Tem certeza que deseja cancelar a solicitação de impressão?</strong> </p>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não</button>
              <button type="button" class="btn btn-secondary" onclick="remove();">Sim</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- MODAL INFO RECUSA-->
        <div class="modal" id="obs_recusada" tabindex="-1" role="dialog" aria-labelledby="motivo_recusa" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="motivo_recusa">Motivo da Recusa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="motivo-recusa-text">

            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>              
            </div>
          </div>
        </div>
      </div>
    </div>
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
    var idRemocao = -1;
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

    function openObsModal(motivo){   
      let motivoTexto = document.getElementById("motivo-recusa-text")
      motivoTexto.innerHTML = motivo;
      $("#obs_recusada").modal();
    }

    function remove() {
      window.location.href = 'controller/changeStatus.php?id=' + idRemocao + '&status=4';
    }
    function openRemoveModal(id) {
      idRemocao = id;      
      $("#cancelar_solicitacao").modal();

    }
  </script>
</body>

</html>