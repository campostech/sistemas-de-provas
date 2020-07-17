<?php
// Adiciona o arquivo de verificação
require_once('./adminphp/verificausuario.php'); 


verificaLogin();
function perfilMenu(){
    $queryMenu = "SELECT PERFIL FROM USUARIO WHERE CPF =".$_SESSION['CPF'];
    $resultadoMenu = mysqli_query(buscaconexao(),$queryMenu);
    $resultadoMenu = mysqli_fetch_assoc($resultadoMenu);
    return $resultadoMenu['PERFIL'];
}



// CONFIGURAÇÃO DO MENU PARA QUE APAREÇA SOMENTE AS OPÇÕES QUE O USUÁRIO TEM ACESSO.
// TROCA PARA O PERFIL ADMINNISTRADOR !!!!!!!!!!!!!
if(perfilMenu()==1){
// Caso seja um administrador imprimi o menu do administrador

echo '	<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
        </a>
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            <li class="nav-item dropdown">      
            </li>
        </ul>
        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>
        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
                    <span> '.$_SESSION["NOME"].' </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> Meu Perfil</a>
                    
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Mensagens <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Configurações da Conta</a>
                    <a href="./controller/logout.php" class="dropdown-item"><i class="icon-switch2"></i> Sair</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->
        <!-- Sidebar content -->
        <div class="sidebar-content">
            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><img src="global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                        </div>
                        <div class="media-body">
                            <div class="media-title font-weight-semibold">'.$_SESSION['NOME'].'</div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user menu -->
            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <!-- Main -->
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Menu"></i></li>
                    <li class="nav-item">
                        <a href="inicial.php" class="nav-link active">
                            <i class="icon-home4"></i>
                            <span>
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Cadastros</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <li class="nav-item"><a href="inicial.php" class="nav-link active">Cadastro de Usuário</a></li>
                            <li class="nav-item"><a href="grid_instrutor_adm.php" class="nav-link">Cadastro de Instrutor</a></li>
                        </ul>
                    </li>
                    
                    <!-- /page kits -->

                </ul>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->
        
    </div>';
}if(perfilMenu() == 2){
    echo '	<!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand">
            <a href="index.html" class="d-inline-block">
                
            </a>
        </div>
        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
    
                <li class="nav-item dropdown">  
                </li>
            </ul>
    
            <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>
    
            <ul class="navbar-nav">
                
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
                        <span> '.$_SESSION["NOME"].' </span>
                    </a>
    
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> Meu Perfil</a>
                        
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Mensagens <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Configurações da Conta</a>
                        <a href="./controller/logout.php" class="dropdown-item"><i class="icon-switch2"></i> Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->
    
    
    <!-- Page content -->
    <div class="page-content">
    
        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    
            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->
    
    
            <!-- Sidebar content -->
            <div class="sidebar-content">
    
                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>
    
                            <div class="media-body">
                                <div class="media-title font-weight-semibold">'.$_SESSION['NOME'].'</div>
                               
                            </div>
    
                            
                        </div>
                    </div>
                </div>
                <!-- /user menu -->
    
    
                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
    
                        <!-- Main -->
                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Menu"></i></li>
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">
                                <i class="icon-home4"></i>
                                <span>
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Cursos</span></a>
    
                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="index.html" class="nav-link active">Default layout</a></li>
                                <li class="nav-item"><a href="layout_2/LTR/default/full/index.html" class="nav-link">Layout 2</a></li>
                                <li class="nav-item"><a href="layout_3/LTR/default/full/index.html" class="nav-link">Layout 3</a></li>
                                <li class="nav-item"><a href="layout_4/LTR/default/full/index.html" class="nav-link">Layout 4</a></li>
                                <li class="nav-item"><a href="layout_5/LTR/default/full/index.html" class="nav-link">Layout 5</a></li>
                                <li class="nav-item"><a href="layout_6/LTR/default/full/index.html" class="nav-link disabled">Layout 6 <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Aulas</span></a>
    
                            <ul class="nav nav-group-sub" data-submenu-title="Themes">
                                <li class="nav-item"><a href="inicial_instrutor.php" class="nav-link active">Aula Rua</a></li>
                                <li class="nav-item"><a href="inicial_instrutor.php" class="nav-link active">Aula Legislação</a></li>
                                
                            </ul>
                        </li>
                        
                        <!-- /page kits -->
    
                    </ul>
                </div>
                <!-- /main navigation -->
    
            </div>
            <!-- /sidebar content -->
            
        </div>';

}
?>