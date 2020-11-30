<?php
require_once('adminphp/validaSessao.php');
if ($_SESSION['PERFIL'] != 1) {
  logout(true);
}
?>

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

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="css/alerta.css">
</head>

<body class="hold-transition sidebar-mini text-sm accent-orange">
  <div class="wrapper">
    <script>
      var file = "";
      var fileName = "";
      var dataQuery = [];
      var idQuery = 0;
    </script>
    <?php
    require_once('case.php');
    require_once('adminphp/conecta.php');
    if (isset($_REQUEST['filter'])) {
      $filter = $_REQUEST['filter'];
    }
    require_once('controller/getSolicitacoesData.php');
    cabecalho();
    nav();
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class="alerta-cadastro-container">
        <div class="alerta-cadastro mt-2">
          <?php
          if (isset($_REQUEST['status'])) {
            if ($_REQUEST['status'] == '200') {
              echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Status atualizado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            } else {
              echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Erro na atualização do Status, verifique e tente novamente.
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
              <h4 class="modal-title" style="text-align: center;" id="modalTitle">Nome do Professor - PENDENTE </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="container" id="modalInfo">
                  Professor: Sauer<br>
                  Disciplina: Redes e Arquitetura<br>
                  Curso: Ciências da Computação<br>
                  Tipo de Impressão: OFICIAL 2<br>
                  Quantidade: 80<br>
                  Frente e Verso: SIM<br>
                  Status: Pendente<br>
                  Data de Solicitação: 17/09/2020<br>
                </div>
                <a class="btn btn-info" style="color:white;" target="_blank" id="downloadLink" href="">Baixar Arquivo</a>
              </div>
            </div>
            <div class="modal-footer">
              <div class="input-group-prepend ">
                <select class="form-control mb-3 optionStatus" onChange="selectedStatus()" name="status_impressao" id="dropStatus" style="display:none;" required>
                  <option value="1" style='background-color: blue; color: white;'>Pendente</option>
                  <option value="2" style='background-color: green; color: white;'>Resolvido</option>
                  <option value="3" style='background-color: red; color: white;'>Recusado</option>
                </select>
                <input type="text" class="form-control optionStatus" value="" placeholder="Motivo" required id="obsStatus" disabled style="display:none;">
              </div>
              <button type="button" class="btn btn-success optionStatus" onclick="saveStatus();" style="display:none;">Salvar</button>
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
                  <div class="mb-2">
                    <?php
                    if (isset($_REQUEST['filter'])) {
                      echo '<a href="solicitacoes.php" class="btn btn-info" style="color: white">Remover Filtro</a>';
                    } else {
                      echo '<a href="solicitacoes.php?filter=1" class="btn btn-info" style="color: white">Filtrar Pendentes</a>';
                    }
                    ?>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
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
                          <th>Disciplina</th>
                          <th>Tipo Impressão</th>
                          <th>Quantidade</th>
                          <th>Status</th>
                          <th>Solicitado em</th>
                          <th>Ver Mais</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($table_data)) {
                          echo $table_data;
                        }
                        ?>
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

    function optionStatus(value) {
      var optionsMenu = document.getElementsByClassName("optionStatus");
      for (var i = 0; i < optionsMenu.length; i++) {
        optionsMenu[i].style.display = value; // depending on what you're doing
      }
      document.getElementById('optionStatusBtn').style.display = value == 'none' ? 'block' : 'none';
    }

    function downloadPDF() {
      const downloadLink = document.createElement("a");
      downloadLink.href = '/file/'.file;
      downloadLink.click();
    }

    function showInfo(id) {
      idQuery = id;
      var v = dataQuery[id];
      file = v["FILE"];
      fileName = v["NOME"] + " - " + v["DISCIPLINA"] + " - " + v["DESCRICAO"];

      document.getElementById('downloadLink').href = 'files/' + v["FILE"];
      document.getElementById('modalTitle').innerHTML = v["NOME"] + " - " + v["STATUS"];
      document.getElementById('modalInfo').innerHTML = 'Professor: ' + v["NOME"] + '<br>Disciplina: ' + v["DISCIPLINA"] + '<br>Curso: ' + v["CURSO"] + '<br>Tipo de Impressão: ' + v["DESCRICAO"] + '<br>Quantidade: ' + v["QUANTIDADE"] + '<br>Frente e Verso: ' + (v["FRENTE_VERSO"] == '1' ? 'SIM' : 'NÃO') + '<br>Status: ' + v["STATUS"] + '<br>Data de Solicitação: ' + v["DATA_SOLICITACAO"] + '<br>' + ((v["OBS"] == null || v["OBS"] == "") ? '<br>' : ('Observação ADMIN: ' + v["OBS"] + '<br>'));
      $('#infoModal').modal('show');
    }

    function selectedStatus() {
      var inputMotivo = document.getElementById('obsStatus');
      inputMotivo.value = "";
      inputMotivo.disabled = (document.getElementById('dropStatus').value != 3);
    }

    function saveStatus() {
      var inputValue = document.getElementById('obsStatus').value;
      var dropValue = document.getElementById('dropStatus').value;
      if (dropValue == 3 && inputValue == "") {
        alert("Insira o motivo de negar a solicitação!");
        return;
      }
      window.location.href = "controller/changeStatus.php?id=" + idQuery + "&status=" + dropValue + (dropValue == 3 ? "&obs=" + inputValue : '');
    }

    function findGetParameter(parameterName) {
      var result = null,
        tmp = [];
      var items = location.search.substr(1).split("&");
      for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
      }
      return result;
    }

    if (findGetParameter('id') != null) {
      showInfo(findGetParameter('id'));
    }
  </script>
</body>

</html>