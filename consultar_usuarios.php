<?php
require_once('adminphp/validaSessao.php');
require_once('adminphp/conecta.php');
require_once('utils/validations.php');
require_once('controller/getUsuariosData.php');

$d_none = isset($table_data) && !empty($table_data) ? "" : "d-none";

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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
              <h1> Cadastros de Usuários</h1>
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

                  <div class="row">
                    <div class="col-4">
                      <div class="input-group mb-3">
                        <input id="input-pesquisa-usuario" type="text" class="form-control" placeholder="Buscar Usuário" aria-describedby="pesquisar-usuario">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="btn-pesquisa-usuario"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-8">
                      <a href="novo_cadastro.php ">
                        <button type="button" class="btn btn-secondary btn-lg  ">Novo Cadastro</button>
                      </a>
                    </div>

                  </div>

                </div>
                <!-- /.card-header -->
                <!-- Modal -->

                <div class="card-body">
                  <?php
                  if (!empty($d_none)) {
                    echo $no_data;
                  }
                  ?>

                  <table id="example1" class="table table-bordered table-striped <?= $d_none ?>">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Ações</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (empty($d_none)) {
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
    <!-- MODAL -->
    <div class="modal" id="confirma_exclusao" tabindex="-1" role="dialog" aria-labelledby="confirma_exclusao" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirma_exclusao">Deseja realmente excluir o cadastro ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Para remoção do cadastro insira a senha de acesso ao sistema:</p>
            <div class="row">
              <div class="col-md-6">
                <label>SENHA</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend ">
                    <span class="input-group-text "><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <label>CONFIRMAÇÃO DE SENHA</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend ">
                    <span class="input-group-text "><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="cpassword" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-outline-secondary">Salvar mudanças</button>
            </div>
          </div>
        </div>
      </div>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="js/pesquisaUsuario.js"> </script>
</body>

</html>