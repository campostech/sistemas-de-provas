<?php
    function cabecalho(){
        echo '
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand text-sm border-bottom-0 navbar-light navbar-orange">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="dist/img/user2-160x160.jpg" class="img-user img-circle elevation-3" alt="User Image" style="height: 34px; margin-top: -8px;">
                        <span>Nome do Usuário</span>
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
      
        <!-- Main Sidebar Container -->';
    }

    function nav(){
        $navS = '<aside class="main-sidebar elevation-4 sidebar-no-expand sidebar-light-orange">
        <!-- Brand Logo -->
        <a href="/index.php" class="brand-link text-sm navbar-orange">
            <img src="dist/img/AdminLTELogo.png"
                alt="Techlab Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">TechLab</span>
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
                    with font-awesome or any other icon font library -->';
    
        $navE = '</ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
        </aside>';
    
        $data = json_decode(file_get_contents('drawer.json'), true)['admin'];
        $navContent = "";
        foreach ($data as &$tab){
            if(!isset($tab['chields'])){
                $navContent =  $navContent.'<li class="nav-item">
                <a href="'.$tab['url'].'" class="nav-link">
                  <i class="nav-icon fas '.$tab['icon'].'"></i>
                  <p>
                    '.$tab['name'].'
                  </p>
                </a>
              </li>';
            }else{
                $itens = "";
                foreach ($tab['chields'] as &$item){
                   $itens = $itens.'<li class="nav-item">
                   <a href="'.$item['url'].'" class="nav-link">
                       <i class="far fa-plus-letf nav-icon"></i>
                       <p>'.$item['name'].'</p>
                   </a>
               </li>';
                }
                $navContent =  $navContent.'<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas '.$tab['icon'].'"></i>
                    <p>
                        '.$tab['name'].'
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a><ul class="nav nav-treeview">
                '.$itens.'
            </ul></li>';
            }
        }
        echo $navS.$navContent.$navE;
    }

    function rodape(){
       echo '<footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2020 <a href="https://www.techlab.com">TechLab</a>.</strong> Todos os direitos reservados.
      </footer>';
    }
?>