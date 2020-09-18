<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>***Sistema de Provas***</title>
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
</head>
<body class="hold-transition sidebar-mini text-sm accent-orange">
<div class="wrapper">
  
  <?php
    require_once('case.php');
    cabecalho();
    nav();
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todas as Solicitações</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div id="infoModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
  
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <h4 class="modal-title" style="text-align: center;">Nome do Professor - PENDENTE </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		</div>
		<div class="modal-body">
			<div class="container">
				Professor: Sauer<br>
        Disciplina: Redes e Arquitetura<br>
        Curso: Ciências da Computação<br>
        Tipo de Impressão: OFICIAL 2<br>
        Quantidade: 80<br>
        Frente e Verso: SIM<br>
        Status: Pendente<br>
        Data de Solicitação: 17/09/2020<br>
        <button type="button" class="btn btn-info" onclick="" >Baixar Arquivo</button>
        </div>
		</div>
		<div class="modal-footer">
      <select class="form-control mb-3 optionStatus" name="status_impressao" style="display:none;" required>
        <option value="1" style='background-color: blue; color: white;'>Pendente</option>
        <option value="2" style='background-color: green; color: white;'>Resolvido</option>
        <option value="3" style='background-color: red; color: white;'>Recusado</option>
      </select>
      <button type="button" class="btn btn-success optionStatus" onclick="optionStatus('none');" style="display:none;">Salvar</button>
      <button type="button" class="btn btn-danger optionStatus" onclick="optionStatus('none');" style="display:none;">Cancelar</button>
      <button type="button" class="btn btn-warning" onclick="optionStatus('block');" id="optionStatusBtn">Mudar Status</button>
		  </div>
	  </div>
	</div>
  </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabela de Solicitações</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Professor</th>
                  <th>Disciplina</th>
                  <th>Tipo Impressão</th>
                  <th>Status</th>
                  <th>Solicitado em</th>
                  <th>Ver Mais</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Sauer</td>
                  <td>Redes e Arquitetura</td>
                  <td>OFICIAL 2</td>
                  <td>Pendente</td>
                  <td>17/09/20</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoModal">Opções</button></td>
                </tr>
                <tr>
                  <td>Sauer</td>
                  <td>Redes e Arquitetura</td>
                  <td>OFICIAL 2</td>
                  <td>Pendente</td>
                  <td>17/09/20</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoModal">Opções</button></td>
                </tr>
                <tr>
                  <td>Sauer</td>
                  <td>Redes e Arquitetura</td>
                  <td>OFICIAL 2</td>
                  <td>Pendente</td>
                  <td>17/09/20</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoModal">Opções</button></td>
                </tr>
                <tr>
                  <td>Sauer</td>
                  <td>Redes e Arquitetura</td>
                  <td>OFICIAL 2</td>
                  <td>Pendente</td>
                  <td>17/09/20</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoModal">Opções</button></td>
                </tr>
                <tr>
                  <td>Sauer</td>
                  <td>Redes e Arquitetura</td>
                  <td>OFICIAL 2</td>
                  <td>Pendente</td>
                  <td>17/09/20</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoModal">Opções</button></td>
                </tr>
                <tr>
                  <td>Sauer</td>
                  <td>Redes e Arquitetura</td>
                  <td>OFICIAL 2</td>
                  <td>Pendente</td>
                  <td>17/09/20</td>
                  <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoModal">Opções</button></td>
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

  function optionStatus (value){
    var optionsMenu = document.getElementsByClassName("optionStatus"); 
    for(var i = 0; i < optionsMenu.length; i++){
      optionsMenu[i].style.display = value; // depending on what you're doing
    }
    document.getElementById('optionStatusBtn').style.display = value == 'none' ? 'block' : 'none';
  }
</script>
</body>
</html>